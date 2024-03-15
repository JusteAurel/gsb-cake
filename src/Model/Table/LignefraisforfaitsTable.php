<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lignefraisforfaits Model
 *
 * @property \App\Model\Table\FraisforfaitsTable&\Cake\ORM\Association\BelongsTo $Fraisforfaits
 * @property \App\Model\Table\FichesTable&\Cake\ORM\Association\BelongsToMany $Fiches
 *
 * @method \App\Model\Entity\Lignefraisforfait newEmptyEntity()
 * @method \App\Model\Entity\Lignefraisforfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraisforfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraisforfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LignefraisforfaitsTable extends Table
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

        $this->setTable('lignefraisforfaits');
        $this->setDisplayField('quantite');
        $this->setPrimaryKey('id');

        $this->belongsTo('Fraisforfaits', [
            'foreignKey' => 'fraisforfait_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsToMany('Fiches', [
            'foreignKey' => 'lignefraisforfait_id',
            'targetForeignKey' => 'fiche_id',
            'joinTable' => 'fiches_lignefraisforfaits',
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
            ->integer('fraisforfait_id')
            ->notEmptyString('fraisforfait_id');

        $validator
            ->scalar('quantite')
            ->maxLength('quantite', 250)
            ->requirePresence('quantite', 'create')
            ->notEmptyString('quantite');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('fraisforfait_id', 'Fraisforfaits'), ['errorField' => 'fraisforfait_id']);

        return $rules;
    }
}
