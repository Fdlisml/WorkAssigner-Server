<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
   use HasFactory;

   protected $table = 'laporans';
   protected $guarded = ['id'];

   public function pekerjaan()
   {
      return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan', 'id');
   }
   public function user()
   {
      return $this->belongsTo(User::class, 'id_user', 'id');
   }
}
