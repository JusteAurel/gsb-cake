<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etats Model
 *
 * @property \App\Model\Table\FichesTable&\Cake\ORM\Association\HasMany $Fiches
 *
 * @method \App\Model\Entity\Etat newEmptyEntity()
 * @method \App\Model\Entity\Etat newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Etat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etat findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Etat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etat[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etat[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Etat[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Etat[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Etat[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EtatsTable extends Table
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

        $this->setTable('etats');
        $this->setDisplayField('etat');
        $this->setPrimaryKey('id');

        $this->hasMany('Fiches', [
            'foreignKey' => 'etat_id',
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
            ->scalar('etat')
            ->maxLength('etat', 250)
            ->requirePresence('etat', 'create')
            ->notEmptyString('etat');

        return $validator;
    }
}
