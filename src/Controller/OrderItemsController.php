<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OrderItems Controller
 *
 * @property \App\Model\Table\OrderItemsTable $OrderItems
 * @method \App\Model\Entity\OrderItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Drugs', 'Measures', 'Administrators'],
        ];
        $orderItems = $this->paginate($this->OrderItems);

        $this->set(compact('orderItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderItem = $this->OrderItems->get($id, [
            'contain' => ['Orders', 'Drugs', 'Measures', 'Administrators'],
        ]);

        $this->set(compact('orderItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $orderItem = $this->OrderItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $orderItem = $this->OrderItems->patchEntity($orderItem, $this->request->getData());
            $orderQuantity = $this->request->getData('quantity');
            $drug_id = $this->request->getData('drug_id');
            $stockRecord = $this->OrderItems->Stocks->find()->select(['quantity'])->where(['drug_id' => $drug_id])->first();
            $stockQuantity = $stockRecord->quantity; 
            $this->set(compact('stockQuantity'));
           
            if ($orderQuantity <= $stockQuantity)
            {
                $quantity = $stockQuantity - $orderQuantity;
                $this->set(compact('quantity'));
                $query = $this->OrderItems->Stocks->query()->update()->set(['quantity' => $quantity])->where(['drug_id' => $drug_id])->execute();
                if (($this->OrderItems->save($orderItem)) && ($query)) 
                {
                   $this->Flash->success(__('The order item has been saved to the order.'));
                   return $this->redirect(['controller'=>'Orders', 'action' => 'view', $orderItem->order_id]);
                }
            }
            elseif ($orderQuantity > $stockQuantity) 
            {
                $this->Flash->error(__('The order item could not be saved. Try a quantity of '.$stockQuantity.' or less.'));
            }
        }
        $orders = $this->OrderItems->Orders->find('list', ['limit' => 200]);
        $drugs = $this->OrderItems->Drugs->find('list', ['limit' => 200]);
        $measures = $this->OrderItems->Measures->find('list', ['limit' => 200]);
        $stocks = $this->OrderItems->Drugs->Stocks->find('list',
        ['keyField' => 'drug.id', 'valueField' => 'drug.name'
        ])->contain(['Drugs']);
        $administrators = $this->OrderItems->Administrators->find('list', ['limit' => 200]);
        $this->set(compact('orderItem', 'orders', 'drugs', 'measures', 'stocks', 'administrators', 'id'));
    }

    /**
     * Edit method 
     *
     * @param string|null $id Order Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $orderItem = $this->OrderItems->get($id, [
            'contain' => ['Drugs'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderItem = $this->OrderItems->patchEntity($orderItem, $this->request->getData());
            $drug_id = $this->request->getData('drug_id');
            $stockRecord = $this->OrderItems->Stocks->find()->select(['quantity'])->where(['drug_id' => $drug_id])->first();
            $orderItemRecord = $this->OrderItems->find()->select(['quantity'])->where(['id' => $id])->first();

            $oldOrderQuantity = $orderItemRecord->quantity;
            $newOrderQuantity = $this->request->getData('quantity');
            $stockQuantity = $stockRecord->quantity;

            if ($newOrderQuantity <= $oldOrderQuantity) 
            {
                $quantity = $oldOrderQuantity - $newOrderQuantity;
                $quantity = $quantity + $stockQuantity;
                $query = $this->OrderItems->Stocks->query()->update()->set(['quantity' => $quantity])->where(['drug_id' => $drug_id])->execute();
                if (($this->OrderItems->save($orderItem)) && ($query))
                {
                    $this->Flash->success(__('The order item has been edited successfully.'));
                    return $this->redirect(['controller'=>'Orders', 'action' => 'view', $orderItem->order_id]);
                }
            }
            elseif ($newOrderQuantity > $oldOrderQuantity)
            {
                $overOrder = $newOrderQuantity - $oldOrderQuantity;
                $maxOverOrder = $stockQuantity - $oldOrderQuantity;
                if ($overOrder <= $maxOverOrder) 
                {
                    $quantity = $stockQuantity - $overOrder;
                    $query = $this->OrderItems->Stocks->query()->update()->set(['quantity' => $quantity])->where(['drug_id' => $drug_id])->execute();
                    if (($this->OrderItems->save($orderItem)) && ($query))
                    {
                        $this->Flash->success(__('The order item has been edited successfully.'));
                        return $this->redirect(['controller'=>'Orders', 'action' => 'view', $orderItem->order_id]);
                    }
                }
                if ($overOrder > $maxOverOrder) 
                {
                    $quantity = $oldOrderQuantity + $stockQuantity;
                    $this->Flash->error(__('The order item could not be saved. Please, try a quantity of upto '.$quantity));
                }
            } 
        }
        $orders = $this->OrderItems->Orders->find('list', ['limit' => 200]);
        $drugs = $this->OrderItems->Drugs->find('list', ['limit' => 200]);
        $measures = $this->OrderItems->Measures->find('list', ['limit' => 200]);
        $administrators = $this->OrderItems->Administrators->find('list', ['limit' => 200]);
        $this->set(compact('orderItem', 'orders', 'drugs', 'measures', 'administrators'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderItem = $this->OrderItems->get($id);
        $drug_id = $orderItem->drug_id;
        $stockRecord = $this->OrderItems->Stocks->find()->select(['quantity'])->where(['drug_id' => $drug_id])->first();
        $stockQuantity = $stockRecord->quantity;
        $orderQuantity = $orderItem->quantity;
        $quantity = $stockQuantity + $orderQuantity;
        $query = $this->OrderItems->Stocks->query()->update()->set(['quantity' => $quantity])->where(['drug_id' => $drug_id])->execute();

        if (($this->OrderItems->delete($orderItem)) && ($query)) 
        {
            $this->Flash->success(__('The order item has been deleted.'));
        } else {
            $this->Flash->error(__('The order item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Orders', 'action' => 'view', $orderItem->order_id]);
    }
}