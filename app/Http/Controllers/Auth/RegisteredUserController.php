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
    public function create(): View
    {
        
        // $semuakelas = DB::select('SELECT * FROM class_table WHERE class_id IN (SELECT DISTINCT class_id FROM dependent_table)');
        // // $semuakelas untuk dptkan kelas yg ada student 
        // $totalPelajar = 0;
    
        // foreach ($semuakelas as $kelas) {
        //     $classId = $kelas->class_id; 
    
        //     $jumlahpelajar = DB::select("SELECT COUNT(*) as total FROM dependent_table WHERE class_id = $classId");
        //     $kelas->totalPelajar = $jumlahpelajar[0]->total;
        // }
    
        // return view('welcome', [
        //     'user' => $request->user(),
        //     'semuakelas' => $semuakelas,
        // ]);

        $semuaSk = DB::select('SELECT * FROM school_table');


        return view('auth.register', [
            'sekolah' => $semuaSk,
            // dump($semuaSk),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);
        // Alert function

        return redirect(RouteServiceProvider::HOME);
    }
}
