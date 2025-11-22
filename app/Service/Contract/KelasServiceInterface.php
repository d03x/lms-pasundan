<?php

namespace App\Service\Contract;


interface KelasServiceInterface
{
    public function handleFirstMatpel();
    public function get_matpels(string|null $kelas = null) : \Illuminate\Support\Collection ;
}
