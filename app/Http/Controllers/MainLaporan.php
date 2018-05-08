<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PreProcessingController as PreProcessing;

class MainLaporan extends Controller
{
    public function stem()
    {
        $text = "Sebuah lembaga bimbingan belajar yang lebih fokus pada pendampingan belajar siswa dengan lebih intensif. 
        Masterprima membuka program bimbingan reguler. semua jenjang SD/MI, SMP, SMA, SMK . Untuk program intensif, 
        program yang dibuka intensif SBMPTN, PKN STAN, dan CPNS.
        Bimbel SD, SMP, SMA, SMK, Alumni, Bimbel STAN,  STIS, SBMPTN ,  POLITEKNIK, POLTEKKES, CPNS";
        $text =  PreProcessingController::stemming($text);

        return count(explode(' ', $text));
        return $text;

    }
}
