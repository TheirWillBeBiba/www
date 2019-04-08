<?php 

require "libs/rb.php";
  R::setup( 'mysql:host=localhost;dbname=howto',
        'root' ); 

  session_start();