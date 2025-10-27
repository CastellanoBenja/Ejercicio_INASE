<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Muestras Model
 *
 * @method \App\Model\Entity\Muestra newEmptyEntity()
 * @method \App\Model\Entity\Muestra newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Muestra> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Muestra get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Muestra findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Muestra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Muestra> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Muestra|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Muestra saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Muestra>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Muestra>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Muestra>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Muestra> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Muestra>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Muestra>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Muestra>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Muestra> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MuestrasTable extends Table
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

        $this->setTable('muestras');
        $this->setDisplayField('numero_de_precinto');
        $this->setPrimaryKey('id');
        $this->hasOne('Resultados', [ 
            'foreignKey' => 'muestra_id',
            'bindingKey' => 'id',
            'joinType' => 'LEFT'
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
            ->scalar('numero_de_precinto')
            ->maxLength('numero_de_precinto', 50)
            ->requirePresence('numero_de_precinto', 'create')
            ->notEmptyString('numero_de_precinto')
            ->add('numero_de_precinto', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('empresa')
            ->maxLength('empresa', 255)
            ->requirePresence('empresa', 'create')
            ->notEmptyString('empresa');

        $validator
            ->scalar('especie')
            ->maxLength('especie', 255)
            ->requirePresence('especie', 'create')
            ->notEmptyString('especie');

        $validator
            ->integer('cantidad_semillas')
            ->requirePresence('cantidad_semillas', 'create')
            ->notEmptyString('cantidad_semillas')
            ->add('cantidad_semillas', 'validarNumeroPositivo', [
                'rule' => function ($value, $context) {
                    return $value > 0;
                },
                'message' => 'La cantidad de semillas debe ser un número positivo.'
            ]);
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
        $rules->add($rules->isUnique(['numero_de_precinto']), ['errorField' => 'numero_de_precinto']);

        return $rules;
    }
}
