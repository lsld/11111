<?php
namespace App\Models;

use App\Models\AddressCoordinates\AddressCoordinate;
use App\Models\Fill\FillRequestRestData;
use App\Models\Material\MaterialRequestRestData;
use App\Models\RequestItems\HirerRequestItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;


class JobRequests extends Model
{
    protected $table = "job_requests";

    protected $morphClass = 'JobRequest';

    protected $fillable = [
        'entity_id',
        'entity_type',
        'street_address',
        'suburb',
        'post_code',
        'state_id',
        'regions_id',
        'duration',
        'description',
        'expiry_date',
        'user_id',

        'job_type_id',
        'required_date',
        'status',
        'created_at'
    ];

    protected $hidden = ['updated_at'];


    public function addressCoordinates()
    {
        return $this->morphOne(AddressCoordinate::class, 'address');
    }

    public function jobType()
    {
        return $this->belongsTo(JobTypes::class);
    }

    public function fillRestData()
    {
        return $this->hasone(FillRequestRestData::class, 'request_id');
    }

    public function materialRestData()
    {
        return $this->hasone(MaterialRequestRestData::class, 'request_id');
    }

    public function plantHire()
    {
        return $this->hasMany(HirerRequestItem::class, 'request_id');
    }

    public function itemData()
    {
        return $this->hasMany(HirerRequestItem::class, 'request_id');
    }


    public function quotes()
    {
        return $this->hasMany(Quotes::class, 'job_request_id');
    }


    public function state()
    {
        return $this->belongsTo(States::class);
    }

    public function regions()
    {
        return $this->belongsTo(Region::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTenantIdAttribute()
    {
        return $user = $this->users->tenant[0]->id;
    }

    /**
     * Get the class name for polymorphic relations.
     *
     * @return string
     */
    public function getMorphClass()
    {
        $morphMap = Relation::morphMap();

        $class = static::class;

        if (!empty($morphMap) && in_array($class, $morphMap)) {
            return array_search($class, $morphMap, true);
        }

        if (!empty($this->morphClass)) {
            $class = $this->morphClass;
        }

        return $class;
    }
}
