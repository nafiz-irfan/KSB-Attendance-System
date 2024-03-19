<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Dependent;
use DB;
use App\Models\School; 
use App\Models\Kelas;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AttendanceController extends Controller
{
    // Show the welcome view
    public function index(Request $request)
    {   
        $user = $request->user();
        if ($user->role != 'superadmin')
        {
        $semuakelas = DB::select('SELECT * FROM class_table WHERE school_id = ? AND class_id  IN (SELECT DISTINCT class_id FROM dependent_table)', [$user->school_id]);
        // $semuakelas untuk dptkan kelas yg ada student 

        $school = School::where('school_id', $user->school_id)->first();
    
        foreach ($semuakelas as $kelas) {
            $classId = $kelas->class_id; 
    
            $jumlahpelajar = DB::select("SELECT COUNT(*) as total FROM dependent_table WHERE class_id = $classId");
            $kelas->totalPelajar = $jumlahpelajar[0]->total;
        }
    
        return view('welcome', [
            'user' => $request->user(),
            'semuakelas' => $semuakelas,
            'school' => $school,
        ]);
        }else{
            $schools = DB::select('SELECT * FROM school_table');

            foreach ($schools as $school) {
            $jumlahPelajar = DB::select("SELECT COUNT(*) as total FROM dependent_table WHERE school = ?", [$school->school_id]);
            $school->totalPelajar = $jumlahPelajar[0]->total;
            }

            return view('welcome', [
                'user' => $request->user(),
                'school' => $schools,
            ]);
        }
    }
    

    // Show the 'kelas' view with the provided $id parameter
    public function show($id, Request $request)
    {
        return view('kelas', ['id' => $id], ['user' => $request->user()]);
    }

    //function utk keluarkan senarai student
    public function senarai($id, Request $request)
    {
        $user = $request->user();
        if ($user->role != 'superadmin')
        {
        $listpelajar = DB::select("SELECT * FROM dependent_table WHERE class_id = $id AND school = ?", [$user->school_id]);
    
        $namakelas = Kelas::where('class_id', $id)
                ->where('school_id', $user->school_id)
                ->first();

        $date = now()->timezone('Asia/Kuala_Lumpur')->toDateString(); 
        $semakkehadiran = [];

        foreach ($listpelajar as $dependent) {
            $attendance = Attendance::where('dependent_id', $dependent->id)
                ->whereDate('date', $date)
                ->get();
            $semakkehadiran[$dependent->id] = $attendance;
        }

        return view('senarai_pelajar', [
            'user' => $user,
            'listpelajar' => $listpelajar,
            'namakelas' => $namakelas,
            'semakkehadiran' => $semakkehadiran,
            'id' => $id, 
        ]);
        }else{
            $listpelajar = DB::select("SELECT * FROM dependent_table WHERE class_id = $id ");
    
            $namakelas = Kelas::where('class_id', $id)
                    ->first();

            $date = now()->timezone('Asia/Kuala_Lumpur')->toDateString(); 
            $semakkehadiran = [];

            foreach ($listpelajar as $dependent) {
                $attendance = Attendance::where('dependent_id', $dependent->id)
                    ->whereDate('date', $date)
                    ->get();
                $semakkehadiran[$dependent->id] = $attendance;
            }

            return view('senarai_pelajar', [
                'user' => $user,
                'listpelajar' => $listpelajar,
                'namakelas' => $namakelas,
                'semakkehadiran' => $semakkehadiran,
                'id' => $id, 
            ]);
        }
    }


    public function edit($id, Request $request)
    {
        $user = $request->user();
        $Murid = Dependent::where('id', $id)->first();
        $Namakelas = Kelas::where('class_id', $Murid->class_id)->first();
        $Kelas = $Namakelas->class_name;
        $KehadiranMurid = Attendance::where('dependent_id', $id)->orderBy('date', 'asc')->get();
        // dd($KehadiranMurid);
        // return view('detail_pelajar', ['id' => $id], ['user' => $request->user()]);
        return view('detail_pelajar', ['user' => $user, 'murid' => $Murid, 'Kelas' => $Kelas, 'KehadiranMurid' => $KehadiranMurid]);
    }

    public function daftarGuru(Request $request)
    {
        return view('daftar_guru', ['user' => $request->user()]);
    }

    public function senaraiGuru(Request $request)
    {
        $user = $request->user();
        // $Gurus = User::all();
        if ($user->role != 'superadmin')
        {
        $Gurus = DB::select("SELECT * FROM users WHERE role != 'superadmin' AND school_id = ?", [$user->school_id]);
        // dump($Gurus);
        $school = School::where('school_id', $user->school_id)->first();
        return view('senarai_guru', [
        'guru' => $Gurus,
        'user' => $user,
        'school' => $school,
        ]);
        }else{

        $Gurus = DB::select("SELECT * FROM users WHERE role = 'admin'");
        $namasekolah = [];
        foreach ($Gurus as $guru) {
            $school = School::where('school_id',$guru->school_id)->first();
            $namasekolah[$guru->id] = $school->school_name;
        
        }
    
        return view('senarai_guru', [
        'guru' => $Gurus,
        'user' => $user,
        'namasekolah' => $namasekolah,
        ]);
        }
    }

    public function laporanPelajar(Request $request)
    {
        return view('laporan_pelajar', ['user' => $request->user()]);
    }

    public function landingpage()
    {
        return view('landingpage');
    }

    public function rekodKehadiran()
    {
        $card_id = request('card_id'); 
        // aku guna DB direct terus senang aku nak pnaggil apa2 table direct
        $checking = DB::select('SELECT * FROM dependent_table WHERE card_no = ?', [$card_id]);
        
        if (!empty($checking)) {
            foreach ($checking as $row) {
                $dependent_id = $row->id; 
            }
    
           // Check dari database untuk tarikh yang sama
            $checkkehadiran = Attendance::where('dependent_id', $dependent_id)
                    ->whereDate('date', date('Y-m-d'))
                    ->first();

            if (!$checkkehadiran) {
            // Simpan data kehadiran
                $attendance = new Attendance;
                $attendance->dependent_id = $dependent_id; 
                $attendance->date = date('Y-m-d');

            try {
                $attendance->save();
                $msg = "Success attend";
            } catch (\Exception $e) {
                // Ohsitkokodail error checking
                $msg = "Oh Sit Kokodail: " . $e->getMessage();
            }
            } else {
                $msg = "Kehadiran untuk tarikh ini sudah didaftarkan.";
            }
        } else {
            // kalau data tak wujud
            $msg = "Data tidak wujud";
        }
    
        return redirect('landingpage')->with('msg',$msg);
    }

    public function tambahKehadiran(Request $request, $id) 
    {
        $tarikh = request('amendDate');
        // $cuba = $id;

        $check = Attendance::where('dependent_id', $id)->whereDate('date', $tarikh)->first();

        if (!$check)
        {
            //simpan data baru ke dlm attendance table
            $attendance = new Attendance;
            $attendance->dependent_id = $id; 
            $attendance->date = $tarikh;
            $attendance->save();
            $msg = "Rekod berjaya disimpan!";
        }
        else {
            $msg = "Rekod Kehadiran telah wujud!";
        }
        // return redirect('/')->with('msg',$msg);
        // return Redirect::route('edit', ['id' => $id]);
        return redirect('edit/' . $id);
    }

    public function profile(Request $request, $id)
    {
        return view('profile_user', ['id' => $id], ['user' => $request->user()]);
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function updateProfile( Request $request, $id)
    {
        //TODO update semua input
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        

        $user->update();
        return view('profile_user', ['id' => $id], ['user' => $request->user()])->with('success', 'Profile updated successfully');
        // return redirect('profile/' . $id);
    }

    public function destroy(Request $request, $id)
    {
        $BuangRekod = Attendance::where('aid', $id)->first();
        $idMurid = $BuangRekod->dependent_id;
        // dd($BuangRekod);
        $BuangRekod->delete();
        
        return redirect('edit/' . $idMurid)->with('success','Rekod Murid telah dipadam!');
    }

    public function destroyGuru(Request $request, $id)
    {
        $user = $request->user();
        
        $delGuru = User::where('id', $id)->first();
        $delGuru->delete();

        return redirect('/senarai_guru');
    }

    public function updatePwd(Request $request, $id) {
        // $pwdBaru = $request->input('password');
        // dd($pwdBaru);
        // dd($pwdBaru);

        $user = User::find($id);
        // dd($user);
        $user->password = $request->input('password');
        $user->update();

        return redirect('/senarai_guru');
    }
}

