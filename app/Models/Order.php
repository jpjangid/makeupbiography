<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no', 'user_id', 'order_amount', 'discount_applied', 'service_charge_applied', 'total_amount',
        'no_items', 'billing_name', 'billing_mobile', 'billing_address', 'billing_country', 'billing_state',
        'billing_city', 'billing_zip', 'billing_landmark', 'shipping_name', 'shipping_mobile', 'shipping_address',
        'shipping_country', 'shipping_state', 'shipping_city', 'shipping_zip', 'shipping_landmark', 'order_status',
        'payment_gateway_id', 'payment_mode', 'payment_currency', 'payment_status', 'shiprocket_order_id',
        'shiprocket_shipment_id', 'coupon_id', 'shop', 'order_comments', 'payment_amount', 'wallet_amount',
        'coupon_discount'
    ];

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
