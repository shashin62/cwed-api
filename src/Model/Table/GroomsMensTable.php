<?php

namespace App\Model\Table;

use App\Model\Entity\GroomsMen;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GroomsMens Model
 *
 */
class GroomsMensTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('grooms_mens');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->requirePresence('name', 'create')
                ->notEmpty('name');

        $validator
                ->requirePresence('position', 'create')
                ->notEmpty('position');

        $validator
                ->requirePresence('date', 'create')
                ->notEmpty('date');

//        $validator
//            ->requirePresence('photo_url', 'create')
//            ->notEmpty('photo_url');

        $validator
                ->requirePresence('description', 'create')
                ->notEmpty('description');

        $validator
                ->add('active', 'valid', ['rule' => 'boolean'])
                ->allowEmpty('active');

        return $validator;
    }

}
