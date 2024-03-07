<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Dependent;
use DB;
use App\Models\School; 
use App\Models\Kelas;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Profiler\Profile;

use Illuminate\Http\Request;

class SuperUser extends Controller
{
    public function showClass(Request $request, $id)
    {
        $semuakelas = DB::select('SELECT * FROM class_table WHERE school_id = ?', [$id]);
    
        // Retrieve the school information based on the provided school ID
        $school = School::where('school_id', $id)->first();
    
        foreach ($semuakelas as $kelas) {
            $classId = $kelas->class_id;
    
            // Count the number of students associated with each class
            $jumlahpelajar = DB::select("SELECT COUNT(*) as total FROM dependent_table WHERE class_id = $classId");
            $kelas->totalPelajar = $jumlahpelajar[0]->total;
        }
    
        return view('senarai_sekolah', [
            'user' => $request->user(),
            'semuakelas' => $semuakelas,
            'school' => $school,
        ]);
    }
    
    //
}
