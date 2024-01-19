<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FichesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FichesTable Test Case
 */
class FichesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FichesTable
     */
    protected $Fiches;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Fiches',
        'app.Users',
        'app.Etats',
        'app.Lignefraisforfaits',
        'app.Lignefraishfs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fiches') ? [] : ['className' => FichesTable::class];
        $this->Fiches = $this->getTableLocator()->get('Fiches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Fiches);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FichesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FichesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
