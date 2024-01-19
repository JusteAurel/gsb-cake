<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FraisforfaitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FraisforfaitsTable Test Case
 */
class FraisforfaitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FraisforfaitsTable
     */
    protected $Fraisforfaits;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Fraisforfaits',
        'app.Lignefraisforfaits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fraisforfaits') ? [] : ['className' => FraisforfaitsTable::class];
        $this->Fraisforfaits = $this->getTableLocator()->get('Fraisforfaits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Fraisforfaits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FraisforfaitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
