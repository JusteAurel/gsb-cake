<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LignefraisforfaitsFixture
 */
class LignefraisforfaitsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'fraisforfait_id' => 1,
                'quantite' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
