<?php

namespace App\Service;

use App\Models\Kelas;
use App\Service\Contract\KelasServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class KelasServiceImpl implements KelasServiceInterface
{
    /**
     * Buat relasi mengunakan query builder manual
     * agar lebih cepet dan
     */
    public function get_matpels(string $kelas_id) : Collection
    {
        $matpel = DB::table('pengajarans')
            ->join('kelas', 'pengajarans.kelas_id', '=', 'kelas.id')
            ->join('matpels', 'pengajarans.matpel_kode', '=', 'matpels.kode')
            ->join('gurus', 'pengajarans.guru_nip', '=', 'gurus.nip')
            ->join('users', 'gurus.user_id', '=', 'users.id')
            ->select(
                'pengajarans.kelas_id',
                'pengajarans.matpel_kode',
                'pengajarans.guru_nip',
                'kelas.nama as nama_kelas',
                'matpels.nama as nama_matpel',
                'matpels.kategori',
                'matpels.created_at',
                'matpels.kode as kode_matpel',
            )->selectRaw("CONCAT_WS(' ',gurus.gelar_depan,users.name,',',gurus.gelar_belakang) AS nama_guru")
            ->where('kelas.id', $kelas_id)
            ->get();

        if (count($matpel) < 0) {
            return null;
        }

        return $matpel;
    }
}
