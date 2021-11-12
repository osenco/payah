<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'method', 'status', 'amount', 'currency', 'reference', 'transaction_id'
    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/payments/' . $this->getKey());
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
