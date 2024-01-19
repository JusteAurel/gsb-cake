<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FraisforfaitsFixture
 */
class FraisforfaitsFixture extends TestFixture
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
                'montant' => 'Lorem ipsum dolor sit amet',
                'fraisforfait' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
