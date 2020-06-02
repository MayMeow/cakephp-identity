<?php
declare(strict_types=1);

namespace CakephpIdentity\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use CakephpIdentity\View\Helper\IdentityHelper;

/**
 * CakephpIdentity\View\Helper\IdentityHelper Test Case
 */
class IdentityHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakephpIdentity\View\Helper\IdentityHelper
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
        $view = new View();
        $this->Identity = new IdentityHelper($view);
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
