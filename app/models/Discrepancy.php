<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Discrepancy extends Model {
    public $timestamps = false;
    protected $table = 'discrepancy';
    protected $fillable = [
        'name', 'asses_year', 'tin', 'comments', 'created_by', 'office_id'
    ];

}
