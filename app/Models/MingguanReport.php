<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MingguanReport extends Model
{
    use HasFactory;
    protected $table = 'mingguan_reports';

    protected $fillable = ['id_vendor', 'no_pa', 'alamat', 'tanggal_update', 'status_pekerjaan', 'tipe_kendala', 'deskripsi_kendala', 'est_pig_tarikan', 'realisasi_tarikan', 'est_pig_tracing',  'realisasi_tracing', 'keterangan' ];
    
}
