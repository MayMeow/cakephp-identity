<?php
declare(strict_types=1);

namespace CakephpIdentity\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PermissionsRoles Model
 *
 * @property \CakephpIdentity\Model\Table\PermissionsTable&\Cake\ORM\Association\BelongsTo $Permissions
 * @property \CakephpIdentity\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \CakephpIdentity\Model\Entity\PermissionsRole newEmptyEntity()
 * @method \CakephpIdentity\Model\Entity\PermissionsRole newEntity(array $data, array $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole[] newEntities(array $data, array $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole get($primaryKey, $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \CakephpIdentity\Model\Entity\PermissionsRole[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PermissionsRolesTable extends Table
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

        $this->setTable('identity_permissions_roles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Permissions', [
            'foreignKey' => 'permission_id',
            'joinType' => 'INNER',
            'className' => 'CakephpIdentity.Permissions',
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
            'className' => 'CakephpIdentity.Roles',
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
        $rules->add($rules->existsIn(['permission_id'], 'Permissions'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
