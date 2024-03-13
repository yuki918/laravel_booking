<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantInfo extends Model
{
    use HasFactory;

    protected $table = 'restaurant_infos';

    protected $fillable = [
        'owner_id',
        'name',
        'img',
        'information',
        'time',
        'budget',
        'zip',
        'pref',
        'city',
        'address',
        'tel',
        'is_selling',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 
}
