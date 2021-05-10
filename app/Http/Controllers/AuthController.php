<?php


namespace App\Http\Controllers;


use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('POST')) {
            return $this->attempt($request);
        }

        return view('login');
    }

    private function attempt(Request $request): Redirector|Application|RedirectResponse
    {
        $validator = Validator::make($request->post(['login', 'password']), [
            'login' => 'required|string|exists:users,login',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('login_page'))->withErrors($validator->errors());
        }

        if (!Auth::attempt($request->only('login', 'password'))) {
            return redirect(route('login_page'))->withErrors((new MessageBag())->add('login', 'Login yo parol xato'));
        }

        return redirect('/ap');
    }
}
