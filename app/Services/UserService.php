<?php

namespace Services;


use App\Constants\UserRole;
use App\Constants\UserStatus;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use App\Models\UserActivation;
use Illuminate\Support\Facades\Hash;
use System\Notifications\EmailConfirmation;

class UserService
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var UserActivation
     */
    private $activation;
    /**
     * @var Tenant
     */
    private $tenant;

    public function __construct(User $user, UserActivation $activation, Tenant $tenant)
    {
        $this->user = $user;
        $this->activation = $activation;
        $this->tenant = $tenant;
    }

    public function create($data, $role, $status = UserStatus::DEACTIVATED)
    {
         $user = $this->user->create($this->attributes($data, $role, $status));
         return $user;
    }

    public function updateUserSettings($id, $request){
        $user = $this->user->find($id);
        $user->first_name = $request['first_name'];
        $user->last_name =  $request['last_name'];
        $user->phone = $request['phone'];
        $user->save();
    }

    private function attributes($data, $slug, $status)
    {
        return [
            'first_name' => $data['first_name'],
            'last_name'=> $data['last_name'],
            'username'=> $data['username'],
            'email'=> $data['email'],
            'phone'=> __get($data,'phone'),
            'avatar'=> !isset($data['avatar'])?"default.jpg":$data['avatar'],
            'password'=> Hash::make($data['password']),
            'role_id'=> Role::bySlug($slug)->id,
            'status' => $status
        ];
    }


    public function addUserToTenant(User $user,Tenant $tenant)
    {
      $user->tenant()->attach($tenant->id);
    }

    public function activateUser($token)
    {
        $activation = $this->activation->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = $this->user->find($activation->user_id);

        $user->status = UserStatus::ACTIVATED;

        $user->save();

        $this->activation->deleteActivation($token);

        return $user;

    }

    public function byTenant($tenant_id)
    {
        return $this->tenant->with('users')->find($tenant_id)->users;
    }


    public function getUserSettings($id){
        return $this->user->where('id', $id)->first();
    }
}