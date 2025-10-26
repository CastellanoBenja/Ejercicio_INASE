<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resultados Model
 *
 * @property \App\Model\Table\MuestrasTable&\Cake\ORM\Association\BelongsTo $Muestras
 *
 * @method \App\Model\Entity\Resultado newEmptyEntity()
 * @method \App\Model\Entity\Resultado newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Resultado> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resultado get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Resultado findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Resultado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Resultado> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resultado|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Resultado saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ResultadosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('resultados');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Muestras', [
            'foreignKey' => 'muestra_id',
            'joinType' => 'INNER',
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
            ->integer('muestra_id')
            ->notEmptyString('muestra_id')
            ->add('muestra_id', 'unique', [
            'rule' => 'validateUnique', 
            'provider' => 'table', 
            'message' => 'Ya existe un resultado registrado para esta muestra. Edite el resultado existente, o elimínelo para crear uno nuevo.'
        ]);

        $validator
            ->decimal('poder_germinativo')
            ->requirePresence('poder_germinativo', 'create')
            ->notEmptyString('poder_germinativo')
            ->add('poder_germinativo', 'validarRango', [
                'rule' => function ($value, $context) {
                    return $value >= 0 && $value <= 100;
                },
                'message' => 'El poder germinativo debe estar entre 0 y 100.'
            ]);

        $validator
            ->decimal('pureza')
            ->requirePresence('pureza', 'create')
            ->notEmptyString('pureza')
            ->add('pureza', 'validarRango', [
                'rule' => function ($value, $context) {
                    return $value >= 0 && $value <= 100;
                },
                'message' => 'La pureza debe estar entre 0 y 100.'
            ]);

        $validator
            ->scalar('materiales_inertes')
            ->allowEmptyString('materiales_inertes');

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
        $rules->add($rules->existsIn(['muestra_id'], 'Muestras'), ['errorField' => 'muestra_id']);

        return $rules;
    }
}
