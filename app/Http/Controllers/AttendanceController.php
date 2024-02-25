<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use DB;

class AttendanceController extends Controller
{
    // Show the welcome view
    public function index(Request $request)
    {
        $semuakelas = DB::select('SELECT * FROM class_table WHERE class_id IN (SELECT DISTINCT class_id FROM dependent_table)');
        // $semuakelas untuk dptkan kelas yg ada student 
        $totalPelajar = 0;
    
        foreach ($semuakelas as $kelas) {
            $classId = $kelas->class_id; 
    
            $jumlahpelajar = DB::select("SELECT COUNT(*) as total FROM dependent_table WHERE class_id = $classId");
            $kelas->totalPelajar = $jumlahpelajar[0]->total;
        }
    
        return view('welcome', [
            'user' => $request->user(),
            'semuakelas' => $semuakelas,
        ]);
    }
    

    // Show the 'kelas' view with the provided $id parameter
    public function show($id, Request $request)
    {
        return view('kelas', ['id' => $id], ['user' => $request->user()]);
    }

    public function senarai(Request $request)
    {
        return view('senarai_pelajar', ['user' => $request->user()]);
    }

    public function edit($id, Request $request)
    {
        return view('detail_pelajar', ['id' => $id], ['user' => $request->user()]);
    }

    public function daftarGuru(Request $request)
    {
        return view('daftar_guru', ['user' => $request->user()]);
    }

    public function senaraiGuru(Request $request)
    {
        $user = $request->user();
        // $Gurus = User::all();
        $Gurus = DB::select("SELECT * FROM users WHERE role != 'admin' AND school_id = ?", [$user->school_id]);
        dump($Gurus);
        return view('senarai_guru', ['guru' => $Gurus], ['user' => $request->user()]);
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
    
}

