<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable= [
        'user_id',
        'ip_address',
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'shipping_address',
        'district_id',
        'division_id',
        'country',
        'message',
        'amount',
        'transaction_id',
        'currency',
        'is_paid',
        'status',

];

     public function user(){
        return $this->belongsTo(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
