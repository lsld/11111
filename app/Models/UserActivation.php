<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function createActivation($user)
    {

        $activation = $this->getActivation($user);

        if (!$activation) {
            return $this->createToken($user);
        }
        return $this->regenerateToken($user);

    }

    private function regenerateToken($user)
    {
        $token = $this->getToken();
        $this->where('user_id', $user->id)->update([
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    private function createToken($user)
    {
        $token = $this->getToken();
        $this->insert([
            'user_id' => $user->id,
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    public function getActivation($user)
    {
        return $this->where('user_id', $user->id)->first();
    }


    public function getActivationByToken($token)
    {
        return $this->where('token', $token)->first();
    }

    public function deleteActivation($token)
    {
        $this->where('token', $token)->delete();
    }
}
