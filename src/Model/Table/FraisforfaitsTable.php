<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fraisforfaits Model
 *
 * @property \App\Model\Table\LignefraisforfaitsTable&\Cake\ORM\Association\HasMany $Lignefraisforfaits
 *
 * @method \App\Model\Entity\Fraisforfait newEmptyEntity()
 * @method \App\Model\Entity\Fraisforfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fraisforfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fraisforfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fraisforfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fraisforfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fraisforfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fraisforfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fraisforfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fraisforfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fraisforfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fraisforfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fraisforfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FraisforfaitsTable extends Table
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

        $this->setTable('fraisforfaits');
        $this->setDisplayField('montant');
        $this->setPrimaryKey('id');

        $this->hasMany('Lignefraisforfaits', [
            'foreignKey' => 'fraisforfait_id',
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
            ->scalar('montant')
            ->maxLength('montant', 250)
            ->requirePresence('montant', 'create')
            ->notEmptyString('montant');

        $validator
            ->scalar('fraisforfait')
            ->maxLength('fraisforfait', 250)
            ->requirePresence('fraisforfait', 'create')
            ->notEmptyString('fraisforfait');

        return $validator;
    }
}
