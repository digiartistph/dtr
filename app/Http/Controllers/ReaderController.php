<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

   public function test(Biometric $bio) {
      $data = $bio::select('user_id', 'scanned')->whereRaw(DB::raw('DATE_FORMAT(scanned, "%Y-%m-%d") = "2017-08-01"'))->get();
      $keyIn = Carbon::parse("2017-08-01 08:00:00");
      $keyOut = Carbon::parse("2017-08-01 12:00:00");
      $keyInPm = Carbon::parse("2017-08-01 13:00:00");
      $keyOutPm = Carbon::parse("2017-08-01 17:00:00");

         echo "AM - In ====<br />";
      foreach($data as $bio) {
         echo $bio->scanned . " || " .  $keyIn->diffInMinutes($bio->scanned, false) . "<br />";
         echo "====<br />";
      }

      echo "AM - Out ====<br />";
      foreach($data as $bio) {
         echo $bio->scanned . " || " .  $keyOut->diffInMinutes($bio->scanned, false) . "<br />";
         echo "====<br />";
      }

      echo "PM - In ====<br />";
      foreach($data as $bio) {
         echo $bio->scanned . " || " .  $keyInPm->diffInMinutes($bio->scanned, false) . "<br />";
         echo "====<br />";
      }

      echo "PM - Out ====<br />";
      foreach($data as $bio) {
         echo $bio->scanned . " || " .  $keyOutPm->diffInMinutes($bio->scanned, false) . "<br />";
         echo "====<br />";
      }
   }

   public function parse(BiometricDataReader $reader) {
      $bags = bitGrinder(1, 0, 1,0, 1);
      echo "binary: " . $bags . "<br />";
      echo "decimal: " . intval($bags, 2);
   }

   public function isNearestBefore($key, $hay = []) {
      // key: 8:00am, for instance.

      return true;
   }

   public function isNearestAfter($key, $hay = []) {
      // key: 8:00am, for instance.
      
      return true;
   }

   public function isTaken($key) {

      return true;
   }

}
