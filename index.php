<?php

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'principal';
    $action     = 'cadastrar';
  }

require_once('/layouts/principal.php');

?>