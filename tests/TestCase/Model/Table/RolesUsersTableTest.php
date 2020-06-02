<?php
declare(strict_types=1);

namespace CakephpIdentity\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CakephpIdentity\Model\Table\RolesUsersTable;

/**
 * CakephpIdentity\Model\Table\RolesUsersTable Test Case
 */
class RolesUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakephpIdentity\Model\Table\RolesUsersTable
     */
    protected $RolesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'plugin.CakephpIdentity.RolesUsers',
        'plugin.CakephpIdentity.Roles',
        'plugin.CakephpIdentity.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RolesUsers') ? [] : ['className' => RolesUsersTable::class];
        $this->RolesUsers = TableRegistry::getTableLocator()->get('RolesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RolesUsers);

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
