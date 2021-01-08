<?php

require 'vendor/autoload.php';

 // when using custom username password
  try {
        $mongo = new MongoDB\Driver\Manager('mongodb://username:password@localhost:27017');
        print_r($mongo->listDatabases());
  } catch (Exception $e) {
        echo $e->getMessage();
  }


 // when using default settings
  try {
        $mongo = new MongoDB\Driver\Manager('mongodb://localhost:27017');
        print_r($mongo->listDatabases());
  } catch (Exception $e) {
        echo $e->getMessage();
  }

  ?>