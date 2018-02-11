<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biometric extends Model
{
   protected $fillable = ['user_id', 'scanned', 'flag'];
}
