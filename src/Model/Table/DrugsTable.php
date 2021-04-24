<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Drugs Model
 *
 * @property \App\Model\Table\StocksTable&\Cake\ORM\Association\HasMany $Stocks
 *
 * @method \App\Model\Entity\Drug newEmptyEntity()
 * @method \App\Model\Entity\Drug newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Drug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Drug get($primaryKey, $options = [])
 * @method \App\Model\Entity\Drug findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Drug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Drug[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Drug|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Drug saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Drug[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Drug[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Drug[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Drug[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DrugsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('drugs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Stocks', [
            'foreignKey' => 'drug_id',
        ]);
        $this->belongsTo('Measures', [
            'foreignKey' => 'measure_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');
        $validator
            ->decimal('price')
            ->maxLength('price', 10)
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->dateTime('manufacturing_date')
            ->requirePresence('manufacturing_date', 'create')
            ->notEmptyDateTime('manufacturing_date');

        $validator
            ->dateTime('expiry_date')
            ->requirePresence('expiry_date', 'create')
            ->notEmptyDateTime('expiry_date');

        return $validator;
    }
}
