<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\Admin\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    Protected AuthService $authServices;

    public function __construct()
    {
        $this->authServices = new AuthService();
    }

    public function login(): View
    {
        return view('admin.auth.login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()
            ->route('admin.login')
            ->with('success', trans("Logout Successfully"));
    }

    public function processLogin(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $remember = $request->has('remember');

        $result = $this->authServices->login($data['email'], $data['password'], $remember);
        if ($result)
            return redirect()->route('admin.index')->with("success", trans("Login Successfully"));

        return redirect()->back()->withErrors(trans("Unknown error please try again"));
    }
}
