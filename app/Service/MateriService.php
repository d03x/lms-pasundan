<?php

namespace App\Service;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
class MateriService implements MateriServiceInterface
{
    public function getMateri(string $kelas_id, string $matpel_id): Collection
    {
        return $materis = DB::table('pengajarans')
            ->where('materials.matpel_kode', '=', $matpel_id)
            ->join('gurus', 'gurus.nip', '=', 'pengajarans.guru_nip')
            ->join('kelas', 'kelas.id', '=', 'pengajarans.kelas_id')
            ->join('matpels', 'matpels.kode', '=', 'pengajarans.matpel_kode')
            ->join('users', 'users.id', '=', 'gurus.user_id')
            ->join('materials', 'materials.matpel_kode', 'pengajarans.matpel_kode')
            ->select(['pengajarans.*','materials.id as materi_id', 'gurus.gelar_depan', 'gurus.gelar_belakang', 'materials.title', 'materials.kelas_ids', 'matpels.nama as nama_matpel', 'users.name as nama_guru'])
            ->get();
        $data = $materis->filter(function ($e) use ($kelas_id) {
            return Collection::fromJson($e->kelas_ids)->contains($kelas_id);
        });
        return $data;
    }
}
