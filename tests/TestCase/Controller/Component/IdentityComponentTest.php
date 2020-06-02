<?php
declare(strict_types=1);

namespace CakephpIdentity\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use CakephpIdentity\Controller\Component\IdentityComponent;

/**
 * CakephpIdentity\Controller\Component\IdentityComponent Test Case
 */
class IdentityComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakephpIdentity\Controller\Component\IdentityComponent
     */
    protected $Identity;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Identity = new IdentityComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Identity);

        parent::tearDown();
    }
}
