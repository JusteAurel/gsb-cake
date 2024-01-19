<?php
declare(strict_types=1);


namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;



// @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users

/**
 * Fiches Model
 *
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users 
 * 
 * @property \App\Model\Table\EtatsTable&\Cake\ORM\Association\BelongsTo $Etats
 * 
 * @property \App\Model\Table\LignefraisforfaitsTable&\Cake\ORM\Association\BelongsToMany $Lignefraisforfaits
 * @property \App\Model\Table\LignefraishfsTable&\Cake\ORM\Association\BelongsToMany $Lignefraishfs
 *
 * @method \App\Model\Entity\Fich newEmptyEntity()
 * @method \App\Model\Entity\Fich newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fich[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fich get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fich findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fich patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fich[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fich|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fich saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FichesTable extends Table
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

        $this->setTable('fiches');
        $this->setDisplayField('moisannee');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', ['className' => '\CakeDC\Users\Model\Table\UsersTable', 
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Etats', [
            'foreignKey' => 'etat_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Lignefraisforfaits', [
            'foreignKey' => 'fiche_id',
            'targetForeignKey' => 'lignefraisforfait_id',
            'joinTable' => 'fiches_lignefraisforfaits',
        ]);
        $this->belongsToMany('Lignefraishfs', [
            'foreignKey' => 'fiche_id',
            'targetForeignKey' => 'lignefraishf_id',
            'joinTable' => 'fiches_lignefraishfs',
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
            ->uuid('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('etat_id')
            ->notEmptyString('etat_id');

        $validator
            ->scalar('moisannee')
            ->maxLength('moisannee', 100)
            ->requirePresence('moisannee', 'create')
            ->notEmptyString('moisannee');

        $validator
            ->scalar('nbjustificatifs')
            ->maxLength('nbjustificatifs', 150)
            ->requirePresence('nbjustificatifs', 'create')
            ->notEmptyString('nbjustificatifs');

        $validator
            ->scalar('montantvalide')
            ->maxLength('montantvalide', 150)
            ->requirePresence('montantvalide', 'create')
            ->notEmptyString('montantvalide');

        $validator
            ->scalar('datemodif')
            ->maxLength('datemodif', 100)
            ->requirePresence('datemodif', 'create')
            ->notEmptyString('datemodif');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('etat_id', 'Etats'), ['errorField' => 'etat_id']);

        return $rules;
    }
}
