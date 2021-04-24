<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrugsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrugsTable Test Case
 */
class DrugsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DrugsTable
     */
    protected $Drugs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Drugs',
        'app.Stocks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Drugs') ? [] : ['className' => DrugsTable::class];
        $this->Drugs = $this->getTableLocator()->get('Drugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Drugs);

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
}
