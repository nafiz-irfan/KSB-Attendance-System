<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Dependent;
use DB;
use App\Models\School; 
use App\Models\Kelas;
use Illuminate\Support\Facades\DB as FacadesDB;

use function PHPUnit\Framework\stringContains;

class AttendanceController extends Controller
{
    // Show the welcome view
    public function index(Request $request)
    {
        $semuakelas = DB::select('SELECT * FROM class_table WHERE class_id IN (SELECT DISTINCT class_id FROM dependent_table)');
        // $semuakelas untuk dptkan kelas yg ada student 

        $user = $request->user();
        $school = School::where('school_id', $user->school_id)->first();
    
        foreach ($semuakelas as $kelas) {
            $classId = $kelas->class_id; 
    
            $jumlahpelajar = DB::select("SELECT COUNT(*) as total FROM dependent_table WHERE class_id = $classId");
            $kelas->totalPelajar = $jumlahpelajar[0]->total;
        }
        
        //panggil semua murid yg sama school dgn teacher pkai eloquent

        $jumlahpelajar = DB::select("SELECT COUNT(*) as total FROM dependent_table WHERE class_id = $classId");
        $kelas->totalPelajar = $jumlahpelajar[0]->total;

        $SemuaMurid = DB::select('SELECT * FROM dependent_table WHERE school = ?' , [$user->school_id]);
        // $SemuaMurid = Dependent::where('school', $user->school_id);
        //murid join with class name
        $SemuaMuridKelas = FacadesDB::table('dependent_table')
                            ->join('class_table', 'dependent_table.class_id', '=', 'class_table.class_id')
                            ->select('dependent_table.*', 'class_table.class_name')
                            ->get();
        //hold data semua murid + class untuk loop count murid based on tahun
        // $Darjah = [];
        // foreach ($SemuaMuridKelas as $Murid) {
            
        //     if (str_contains($Murid->class_name, '1')) {
        //         $Darjah['1']++;
        //     }
        //     elseif (str_contains($Murid->class_name, '2')) {
        //         $Darjah[1]++;
        //     }
        // }
        // dd($Darjah[]);


        // $SemuaMuridKelas = DB::select('SELECT * FROM dependent_table, class_table.class_name INNER JOIN class_table ON dependent_table.class_id=class_table.class_id');
        // dd($SemuaMuridKelas);
        // $skID = $user->school_id;
        // dd($school);
        // $murid = DB::select('SELECT * FROM depedent_table WHERE ', [1])
    
        return view('welcome', [
            'user' => $request->user(),
            'semuakelas' => $semuakelas,
            'school' => $school,
        ]);
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
        $listpelajar = DB::select("SELECT * FROM dependent_table WHERE class_id = $id AND school = ?", [$user->school_id]);
    
        $namakelas = Kelas::where('class_id', $id)
                ->where('school_id', $user->school_id)
                ->first();

        $date = now()->toDateString(); 
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
        // dump($Gurus);
        $school = School::where('school_id', $user->school_id)->first();
        return view('senarai_guru', [
        'guru' => $Gurus,
        'user' => $user,
        'school' => $school,
    ]);
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

