<?php

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $table = "admin_user_roles";

    protected $fillable = [
        'label'
    ];

}