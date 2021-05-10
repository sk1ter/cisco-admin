<?php


namespace App\Http\Controllers;


use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function index(Request $request): View|Factory|Redirector|Application|RedirectResponse
    {
        if ($request->isMethod('POST')) {
            return $this->attempt($request);
        }

        return view('login');
    }

    private function attempt(Request $request): Redirector|Application|RedirectResponse
    {
        $validator = Validator::make($request->only(['login', 'password']), [
            'login' => 'required|string|exists:users,login',
            'password' => 'required'
        ], [], [
            'login' => 'логин',
            'password' => 'пароль'
        ]);

        if ($validator->fails()) {
            return redirect(route('login_page'))->withErrors($validator->errors());
        }

        if (!Auth::attempt($request->only('login', 'password'))) {
            return redirect(route('login_page'))->withErrors((new MessageBag())->add('login', 'Логин или пароль неверный'));
        }

        return redirect('/ap');
    }
}
