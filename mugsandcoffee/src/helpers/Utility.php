<?php

if (! function_exists('bitGrinder')) {
   function bitGrinder(...$bits) {
      if (empty($bits))
         return 0;

      // reverse the order or little-endian
      $bits = array_reverse($bits);
      $binary = implode($bits);
      $decimal = intval($binary, 2);

      return $decimal;
   }
} 
