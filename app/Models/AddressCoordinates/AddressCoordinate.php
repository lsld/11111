<?php

namespace App\Models\AddressCoordinates;

use Illuminate\Database\Eloquent\Model;

class AddressCoordinate extends Model
{
    protected $table = 'address_coordinates';
    protected $fillable = ['address_id', 'address_type', 'latitude', 'longitude'];
    protected $hidden = ['created_at', 'updated_at'];

    public function addressCoordinates()
    {
        return $this->morphTo();
    }
}