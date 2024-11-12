<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property string $date
 * @property int $transaction_category_id
 * @property int $product_id
 * @property int $supplier_id
 * @property int $sales_id
 * @property int $quantity
 * @property string $berita_acara
 * @property string|null $note
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'transaction_category_id', 'product_id', 'supplier_id', 'sales_id', 'quantity'], 'required'],
            [['date'], 'safe'],
            [['transaction_category_id', 'product_id', 'supplier_id', 'sales_id', 'quantity'], 'integer'],
            [['note'], 'string'],
            [['berita_acara'], 'file', 'skipOnEmpty' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Transaksi',
            'date' => 'Date',
            'transaction_category_id' => 'Transaction Category ID',
            'product_id' => 'Product ID',
            'supplier_id' => 'Supplier ID',
            'sales_id' => 'Sales ID',
            'quantity' => 'Quantity',
            'berita_acara' => 'Berita Acara',
            'note' => 'Note',
        ];
    }

    public function getTransactionCategory()
    {
        return $this->hasOne(TransactionCategories::class, ['id' => 'transaction_category_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Products::class, ['id' => 'product_id']);
    }

    public function getSupplier()
    {
        return $this->hasOne(Suppliers::class, ['id' => 'supplier_id']);
    }

    public function getSales()
    {
        return $this->hasOne(Saleses::class, ['id' => 'sales_id']);
    }
}
