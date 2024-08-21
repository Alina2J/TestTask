<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function main_page()
    {
        return view('main-page');
    }

    public function reg_page()
    {
        return view('reg-page');
    }

    public function login_page()
    {
        return view('login-page');
    }

    public function update_password_page()
    {
        return view('update-password-page');
    }

    public function profile_page()
    {
        return view('profile-page');
    }

    public function single_card_page($id)
    {
        $card = Application::find($id);

        return view('single-card-page', compact('card'));
    }

    public function forgot_password_page()
    {
        return view('forgot-password-page');
    }

    public function reset_password_page(Request $request)
    {
        return view('reset-password-page', ['request' => $request]);
    }

    public function applications_list_page()
    {
        $cards = Application::get();

        return view('applications-list-page', compact('cards'));
    }
}
