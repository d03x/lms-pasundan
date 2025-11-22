<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matpel;
use App\Models\Siswa;
use App\Service\Contract\KelasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function materi(Request $request, KelasServiceInterface $kelasService)
    {
        $kelas = $request->kelas;
        $matpel = $kelasService->get_matpels($request->kelas['id']);
        /**
         * jika url kosong redirect pake first id
         */
        if (($data = $matpel->first()) && !$request->query('matpel_id')) {
            return to_route('siswa.materi', [
                'matpel_id' => $data->kode_matpel,
            ]);
        }
        //ambil semua materi yang dimiliki siswa
        $data = $kelasService->getMateriMatpel($kelas['id'], $request->query('matpel_id'));
        return inertia('siswa/materi', [
            'materials' => $data->map(function ($e) {
                return [
                    'nama_guru' => "Efendy",
                    'title' => $e->title,
                    'nama_matpel' => $e->nama_matpel,
                    'nama_guru' => "$e->gelar_depan $e->nama_guru, $e->gelar_belakang"
                ];
            }),
            'matpels' => $matpel,
            'current_matpel' => $request->query('matpel_id'),
        ]);
    }
    public function view()
    {
        return inertia('siswa/view-materi');
    }
}
