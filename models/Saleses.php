<?php

namespace app\models;

use Yii;
use app\models\Suppliers;

/**
 * This is the model class for table "saleses".
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string $email
 * @property string|null $address
 * @property int $supplier_id
 */
class Saleses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saleses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone_number', 'email', 'supplier_id'], 'required'],
            [['address'], 'string'],
            [['supplier_id'], 'integer'],
            [['name', 'phone_number', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'address' => 'Address',
            'supplier_id' => 'Supplier Name',
        ];
    }

    public function getSupplier()
    {
        return $this->hasOne(Suppliers::class, ['id' => 'supplier_id']);
    }
}
