<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function registration(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:2',
            'surname' => 'required|string|min:3',
            'phone' => 'required|integer|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed|min:5'
        ]);

        $userData = $request->all();

        $user = new User();
        $user->name = $userData['name'];
        $user->surname = $userData['surname'];
        $user->phone = $userData['phone'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('/profile');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|string|exists:users',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('profile-page');
        }

        return back()->withErrors([
            'password' => 'Неверный пароль'
        ]);

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Данный email не зарегестрирован.'
            ]);
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => bcrypt($request->password),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', trans($status));
        }
    }

    public function notice(Request $request)
    {

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('/');
        }

        return view('verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('/');
        }

        $request->fulfill();

        return redirect()->intended('/profile');
    }

    public function send(Request $request)
    {

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('/');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Ссылка отправлена!');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current-password' => 'required|string',
            'password' => 'required|confirmed|min:5'
        ]);

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Текущий пароль введён неверно, попробуйте ещё раз!");
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success", "Пароль успешно изменён!");
    }

}
