<?php

namespace App\Service\Contract;


interface KelasServiceInterface
{
    public function get_matpels(string $kelas) : \Illuminate\Support\Collection ;
}
