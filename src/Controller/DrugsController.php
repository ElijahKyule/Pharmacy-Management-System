<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Drugs Controller
 *
 * @property \App\Model\Table\DrugsTable $Drugs
 * @method \App\Model\Entity\Drug[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DrugsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {   $this->paginate = [
            'contain' => ['Measures'],
        ];
        $drugs = $this->paginate($this->Drugs);

        $this->set(compact('drugs'));
    }

    /**
     * View method
     *
     * @param string|null $id Drug id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $drug = $this->Drugs->get($id, [
            'contain' => ['Stocks'],
        ]);

        $this->set(compact('drug'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $drug = $this->Drugs->newEmptyEntity();
        if ($this->request->is('post')) {
            $drug = $this->Drugs->patchEntity($drug, $this->request->getData());
            if ($this->Drugs->save($drug)) {
                $this->Flash->success(__('The drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drug could not be saved. Please, try again.'));
        }
        $this->set(compact('drug'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Drug id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $drug = $this->Drugs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $drug = $this->Drugs->patchEntity($drug, $this->request->getData());
            if ($this->Drugs->save($drug)) {
                $this->Flash->success(__('The drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drug could not be saved. Please, try again.'));
        }
        $measures = $this->Drugs->Measures->find('list', ['limit' => 200]);
        $this->set(compact('drug', 'measures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Drug id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $drug = $this->Drugs->get($id);
        if ($this->Drugs->delete($drug)) {
            $this->Flash->success(__('The drug has been deleted.'));
        } else {
            $this->Flash->error(__('The drug could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
