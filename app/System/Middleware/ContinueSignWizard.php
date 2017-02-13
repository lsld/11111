<?php

namespace System\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class ContinueSignWizard
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($route = session('sign_up_wizard.current_route')) {
            if (Route::current()->getName() != $route ) {
                return redirect()->route($route);
            }
        } else {
            if (Route::current()->getName() != "show_supplier_singup_subscription" ) {
                return redirect()->route("show_supplier_singup_subscription");
            }
        }

        return $next($request);
    }
}
