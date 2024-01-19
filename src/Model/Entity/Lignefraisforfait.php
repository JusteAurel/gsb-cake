<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lignefraisforfait Entity
 *
 * @property int $id
 * @property int $fraisforfait_id
 * @property string $quantite
 *
 * @property \App\Model\Entity\Fraisforfait $fraisforfait
 * @property \App\Model\Entity\Fich[] $fiches
 */
class Lignefraisforfait extends Entity
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
        'fraisforfait_id' => true,
        'quantite' => true,
        'fraisforfait' => true,
        'fiches' => true,
    ];
}
