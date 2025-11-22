<?php

namespace App\Service\Contract;


interface KelasServiceInterface
{
    public function get_matpels(string|null $kelas = null) : \Illuminate\Support\Collection ;
    public function getMateriMatpel(string $kelas_id, string $matpel_id) : \Illuminate\Support\Collection ;
}
