<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {
    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = [
        'name', 'remember_token', 'user_type','email', 'office_id', 'password', 'office_id', 'office_id', 'is_activated'
    ];

}
