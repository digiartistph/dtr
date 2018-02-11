<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpreadsheetReader;
use MugsandCoffee\BiometricDataReader\BiometricDataReader;

class ReaderController extends Controller
{
   public function index() {
      // $Reader = new SpreadsheetReader('/home/vagrant/code/dtr/public/dtr.dat');
      $Reader = new SpreadsheetReader('dtr.dat');
      echo "<pre />";
      foreach ($Reader as $Row)
      {
         print_r($Row);
      }

   }

   public function parse(BiometricDataReader $reader) {

   }
}
