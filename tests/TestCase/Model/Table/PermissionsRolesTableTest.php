<?php
declare(strict_types=1);

namespace CakephpIdentity\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CakephpIdentity\Model\Table\PermissionsRolesTable;

/**
 * CakephpIdentity\Model\Table\PermissionsRolesTable Test Case
 */
class PermissionsRolesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakephpIdentity\Model\Table\PermissionsRolesTable
     */
    protected $PermissionsRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'plugin.CakephpIdentity.PermissionsRoles',
        'plugin.CakephpIdentity.Permissions',
        'plugin.CakephpIdentity.Roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PermissionsRoles') ? [] : ['className' => PermissionsRolesTable::class];
        $this->PermissionsRoles = TableRegistry::getTableLocator()->get('PermissionsRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PermissionsRoles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
