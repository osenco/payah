<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $fillable = [
        'user_id',
        'method',
        'status',
        'amount',
        'currency',
        'reference',
        'transaction_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/payouts/' . $this->getKey());
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
