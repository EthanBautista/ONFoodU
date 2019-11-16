<?php
  if(file_exists('env.php')) {
      include 'env.php';
  }else{
      echo "TEST";
  }
  if(!function_exists('env')) {
      function env($key, $default = null)
      {
          $value = getenv($key);
          if ($value === false) {
              return $default;
          }
          return $value;
      }
  }
?>