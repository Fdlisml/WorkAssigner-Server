<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
   use HasFactory;

   protected $table = "pekerjaans";
   protected $guarded = ['id'];

   public function project()
   {
      return $this->belongsTo(Project::class, 'id_proyeks', 'id');
   }
   public function user()
   {
      return $this->belongsTo(User::class, 'id_user', 'id');
   }
}
