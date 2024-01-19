<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LignefraishfsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LignefraishfsTable Test Case
 */
class LignefraishfsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LignefraishfsTable
     */
    protected $Lignefraishfs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignefraishfs',
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
        $config = $this->getTableLocator()->exists('Lignefraishfs') ? [] : ['className' => LignefraishfsTable::class];
        $this->Lignefraishfs = $this->getTableLocator()->get('Lignefraishfs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lignefraishfs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LignefraishfsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
