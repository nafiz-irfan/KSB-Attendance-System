<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
    public function create(Request $request): View
    {
        $semuaSk = DB::select('SELECT * FROM school_table');

        return view('auth.register', [
            'user' => $request->user(),
            'user' => $request->user(),
            'sekolah' => $semuaSk,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //get class_id from class_name
        $schoolName = $request->school;
        $schoolId = DB::select("SELECT school_id FROM school_table WHERE school_name = ?", [$schoolName]);
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            //TODO add peranan and sekolah
            'role' => $request->role,
            'school_id' => intval($schoolId),
        ]);

        event(new Registered($user));

        // Auth::login($user);
        // Alert function
        // dd($request->get('school'));
        // dd($request->get('school'));

        return redirect(RouteServiceProvider::HOME);
    }
}
