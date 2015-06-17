<?php
  

  function call($controller, $action) {

    require_once('/controllers/' . $controller .'.php');

    switch($controller) {
      case 'principal':
        $controller = new Principal();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array('principal' => ['editar', 'cadastrar','listar','detalhes','deletar','erro']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('principal', 'erro');
    }
  } else {
    call('principal', 'erro');
  }
?>