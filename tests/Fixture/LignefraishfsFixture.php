<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LignefraishfsFixture
 */
class LignefraishfsFixture extends TestFixture
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
                'date' => '2024-01-18',
                'montant' => 'Lorem ipsum dolor sit amet',
                'fraishf' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
