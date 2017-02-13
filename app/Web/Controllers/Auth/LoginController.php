<?php

namespace Web\Controllers\Auth;

use App\Constants\UserStatus;
use App\Events\AuthLoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Services\UserService;
use Web\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo       = '/dashboard/supplier';
    protected $adminTo          = '/admin';
    protected $hireRedirectTo   = '/my-job-request';
    protected $request          = '';

//    protected function credentials(Request $request)
//    {
//        return $request->only($this->username(), 'password', 'status');
//    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->request = $request;
    }

    public function username()
    {
        if(filter_var($this->request->email, FILTER_VALIDATE_EMAIL)){
            return 'email';
        } else {
            return 'username';
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                'fail' => Lang::get('auth.failed'),
            ]);
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['status'] = UserStatus::ACTIVATED;
        return $credentials;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/login');
    }

    public function activateUser($token, UserService $userService)
    {
        if ($user = $userService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        return redirect('/login');
    }

    public function redirectPath()
    {
        $redirectTo = $this->redirectTo;

        switch(Auth::user()->role_id){
            case 1:
                $redirectTo = $this->adminTo;
                break;
            case 2:
                $redirectTo = $this->adminTo;
                break;
            case 3: /* supplier dashboard */
                $redirectTo = $this->redirectTo;
                break;
            case 4: /* if user is hirer then redirect to my job list */
                $redirectTo = $this->hireRedirectTo;
                break;
        }

        event(new AuthLoginLog(Auth::user(), date('Y-m-d H:m:s')));
        return property_exists($this, 'redirectTo') ? $redirectTo : '/home';
    }

}
