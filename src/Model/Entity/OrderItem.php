<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderItem Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $drug_id
 * @property int $quantity
 * @property int $measure_id
 * @property int $administrator_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Drug $drug
 * @property \App\Model\Entity\Measure $measure
 * @property \App\Model\Entity\Administrator $administrator
 */
class OrderItem extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'order_id' => true,
        'drug_id' => true,
        'quantity' => true,
        'measure_id' => true,
        'administrator_id' => true,
        'created' => true,
        'modified' => true,
        'order' => true,
        'drug' => true,
        'measure' => true,
        'administrator' => true,
    ];
}
