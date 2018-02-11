<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpreadsheetReader;
use MugsandCoffee\BiometricDataReader\BiometricDataReader;
use App\Biometric;
use Carbon\Carbon;

class ReaderController extends Controller
{
   public function index() {
      // $Reader = new SpreadsheetReader('/home/vagrant/code/dtr/public/dtr.dat');
      $Reader = new SpreadsheetReader('dtr.dat');
      echo "<pre />";
      foreach ($Reader as $row)
      {
         print_r($row);
         // echo $Row[0] . "<br />";
         Biometric::create([
            'user_id' => $row[0],
            'scanned' => Carbon::parse($row[1]),
            'flag' => bitGrinder($row[2], $row[3], $row[4], $row[5])
         ]);
      }

   }

   public function parse(BiometricDataReader $reader) {
      $bags = bitGrinder(1, 0, 1,0, 1);
      echo "binary: " . $bags . "<br />";
      echo "decimal: " . intval($bags, 2);
   }
}
