<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $username;
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    public function __construct()
    {
        $this->middleware("guest:admin", ['except' => ['logout']]);
        $this->username = $this->findUsername();
    }

    public function findUsername()
    {
        $fieldValue = request()->input('email');

        $login_type = filter_var($fieldValue, FILTER_VALIDATE_EMAIL )
            ? 'email'
            : 'username';

        request()->merge([$login_type => $fieldValue]);

        return $login_type;
    }

    public function username()
    {
        return $this->username;
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->admin_status) {
            Auth::guard('admin')->logout();
            return back()->with('error_message', 'Your account is inactive, please contact your administrator.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

}
