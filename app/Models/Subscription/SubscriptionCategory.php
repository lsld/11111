<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Model;

class SubscriptionCategory extends Model
{
    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];


    /* Relations */

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    /* End of Relations */
}