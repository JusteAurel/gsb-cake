<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\LignefraisforfaitsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\LignefraisforfaitsController Test Case
 *
 * @uses \App\Controller\LignefraisforfaitsController
 */
class LignefraisforfaitsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignefraisforfaits',
        'app.Fraisforfaits',
        'app.Fiches',
        'app.FichesLignefraisforfaits',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
