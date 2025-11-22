<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matpel;
use App\Models\Siswa;
use App\Service\Contract\KelasServiceInterface;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function materi(Request $request, KelasServiceInterface $kelasService)
    {
        $matpel = $kelasService->get_matpels($request->kelas['id']);
        if (($data = $matpel->first()) && !$request->query('matpel_id')) {
            return to_route('siswa.materi', [
                'matpel_id' => $data->kode_matpel,
            ]);
        }
        return inertia('siswa/materi', [
            'matpels' => $matpel,
        ]);
    }
    public function view()
    {
        return inertia('siswa/view-materi');
    }
}
