<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fich Entity
 *
 * @property int $id
 * @property string $user_id
 * @property int $etat_id
 * @property string $moisannee
 * @property string $nbjustificatifs
 * @property string $montantvalide
 * @property string $datemodif
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Etat $etat
 * @property \App\Model\Entity\Lignefraisforfait[] $lignefraisforfaits
 * @property \App\Model\Entity\Lignefraishf[] $lignefraishfs
 */
class Fich extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'etat_id' => true,
        'moisannee' => true,
        'nbjustificatifs' => true,
        'montantvalide' => true,
        'datemodif' => true,
        'user' => true,
        'etat' => true,
        'lignefraisforfaits' => true,
        'lignefraishfs' => true,
    ];
}
