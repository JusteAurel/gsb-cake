<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LignefraisforfaitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LignefraisforfaitsTable Test Case
 */
class LignefraisforfaitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LignefraisforfaitsTable
     */
    protected $Lignefraisforfaits;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignefraisforfaits',
        'app.Fraisforfaits',
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
        $config = $this->getTableLocator()->exists('Lignefraisforfaits') ? [] : ['className' => LignefraisforfaitsTable::class];
        $this->Lignefraisforfaits = $this->getTableLocator()->get('Lignefraisforfaits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lignefraisforfaits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LignefraisforfaitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LignefraisforfaitsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
