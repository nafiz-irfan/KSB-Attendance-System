<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function landingPage()
    {
        return view('landingpage');
    }
}

