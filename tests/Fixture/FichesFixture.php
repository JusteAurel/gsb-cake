<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FichesFixture
 */
class FichesFixture extends TestFixture
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
                'user_id' => 'f57af1a6-04b9-4532-a8f7-5f6dc1a0ff77',
                'etat_id' => 1,
                'moisannee' => 'Lorem ipsum dolor sit amet',
                'nbjustificatifs' => 'Lorem ipsum dolor sit amet',
                'montantvalide' => 'Lorem ipsum dolor sit amet',
                'datemodif' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
