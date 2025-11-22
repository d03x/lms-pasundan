<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function materi(Request $request){
        return inertia('siswa/materi');
    }
    public function view(){
        return inertia('siswa/view-materi');
    }
}
