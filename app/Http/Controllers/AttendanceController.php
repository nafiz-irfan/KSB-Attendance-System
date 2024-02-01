<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

