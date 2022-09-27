<?php

// save data in the session
session_start();

  $conn = mysqli_connect(
    'localhost', // direction
    'root', // user
    'mysqlr00tus3r@home', // password
    'php_mysql_crud' // db name
  );
  
  // if(isset($conn)){
  //   echo 'DB is connected';
  // }
