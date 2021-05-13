<?php

// Initiate Connection to DB
$connection = new mysqli('localhost', 'root', 'root', 'ubs');
/*
 * Check Connection
 *
 */
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
