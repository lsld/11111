<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCodes extends Model
{
    public $table = "promo_codes"; 
    
    public $fillable = [
        "id",
        "code_name",
        "code_id",
        "description",
        "status",
        "state",
        "from_date",
        "to_date",
        "created_at",
        "created_by",
        "discount"
    ];
    
}
