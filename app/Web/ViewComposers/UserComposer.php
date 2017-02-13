<?php
/**
 * Created by PhpStorm.
 * User: maduranga
 * Date: 2/13/17
 * Time: 10:57 AM
 */

namespace Web\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $view->with('user', Auth::user());
    }
}