<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Biometric extends Model
{
   protected $fillable = ['user_id', 'scanned', 'flag'];
   protected $dates = [
      'created_at',
      'updated_at',
      'scanned'
   ];

   //public function getScannedAttribute($value) {
      //return Carbon::parse($value)->format('Y-m-d');
   //}
}
