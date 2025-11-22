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
    public function get_matpels(string|null $kelas_id = null): Collection
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
            )->selectRaw("CONCAT_WS(' ',gurus.gelar_depan,users.name,',',gurus.gelar_belakang) AS nama_guru");

        if ($kelas_id) {
            $matpel->where('kelas.id', $kelas_id);
            return $matpel->get();
        }
        return $matpel->get();
    }

    public function getMateriMatpel(string $kelas_id, string $matpel_id) : Collection
    {
        return $materis = DB::table('pengajarans')
            ->where('materials.matpel_kode', '=', $matpel_id)
            ->join('gurus', 'gurus.nip', '=', 'pengajarans.guru_nip')
            ->join('kelas', 'kelas.id', '=', 'pengajarans.kelas_id')
            ->join('matpels', 'matpels.kode', '=', 'pengajarans.matpel_kode')
            ->join('users', 'users.id', '=', 'gurus.user_id')
            ->join('materials', 'materials.matpel_kode', 'pengajarans.matpel_kode')
            ->select(['pengajarans.*', 'gurus.gelar_depan', 'gurus.gelar_belakang', 'materials.title', 'materials.kelas_ids', 'matpels.nama as nama_matpel', 'users.name as nama_guru'])
            ->get();
        $data = $materis->filter(function ($e) use ($kelas_id) {
            return Collection::fromJson($e->kelas_ids)->contains($kelas_id);
        });
        return $data;
    }
}
