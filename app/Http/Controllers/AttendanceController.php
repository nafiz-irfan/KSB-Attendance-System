<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use DB;

class AttendanceController extends Controller
{
    // Show the welcome view
    public function index()
    {
        return view('welcome');
    }

    // Show the 'kelas' view with the provided $id parameter
    public function show($id)
    {
        return view('kelas', ['id' => $id]);
    }

    public function senarai()
    {
        return view('senarai_pelajar');
    }

    public function edit($id)
    {
        return view('detail_pelajar', ['id' => $id]);
    }

    public function daftarGuru()
    {
        return view('daftar_guru');
    }

    public function senaraiGuru()
    {
        $Gurus = User::all();
        dump($Gurus);
        return view('senarai_guru', ['guru' => $Gurus]);
    }

    public function laporanPelajar()
    {
        return view('laporan_pelajar');
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

