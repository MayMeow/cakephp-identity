<?php
declare(strict_types=1);

namespace CakephpIdentity\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Roles Model
 *
 * @property \CakephpIdentity\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \CakephpIdentity\Model\Entity\Role newEmptyEntity()
 * @method \CakephpIdentity\Model\Entity\Role newEntity(array $data, array $options = [])
 * @method \CakephpIdentity\Model\Entity\Role[] newEntities(array $data, array $options = [])
 * @method \CakephpIdentity\Model\Entity\Role get($primaryKey, $options = [])
 * @method \CakephpIdentity\Model\Entity\Role findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \CakephpIdentity\Model\Entity\Role patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakephpIdentity\Model\Entity\Role[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \CakephpIdentity\Model\Entity\Role|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakephpIdentity\Model\Entity\Role saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakephpIdentity\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \CakephpIdentity\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \CakephpIdentity\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \CakephpIdentity\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RolesTable extends Table
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

        $this->setTable('identity_roles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Users', [
            'foreignKey' => 'role_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'identity_roles_users',
            'className' => 'CakephpIdentity.Users',
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->uuid('sid')
            ->requirePresence('sid', 'create')
            ->notEmptyString('sid');

        return $validator;
    }
}
