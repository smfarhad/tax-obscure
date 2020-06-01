<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hearing extends Model
{
    //
    protected $table = 'hearings';
    public $timestamps = false;

       protected $fillable = [
        'hearing_date', 'place', 'discrepancy_id', 'created_by',
    ];
}
