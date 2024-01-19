<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtatsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtatsTable Test Case
 */
class EtatsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EtatsTable
     */
    protected $Etats;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Etats',
        'app.Fiches',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Etats') ? [] : ['className' => EtatsTable::class];
        $this->Etats = $this->getTableLocator()->get('Etats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Etats);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EtatsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
