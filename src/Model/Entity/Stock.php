<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $drug_id
 * @property \Cake\I18n\FrozenTime $purchase_date
 * @property \Cake\I18n\FrozenTime $expiry_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\Drug $drug
 */
class Stock extends Entity
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
        'quantity' => true,
        'measure_id' => true,
        'supplier_id' => true,
        'drug_id' => true,
        'purchase_date' => true,
        'expiry_date' => true,
        'created' => true,
        'modified' => true,
        'supplier' => true,
        'drug' => true,
    ];
}
