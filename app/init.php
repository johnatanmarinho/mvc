<?php
spl_autoload_register(function ($class){
  $class = strtolower($class);

  $file = $_SERVER['DOCUMENT_ROOT']. '/mvc2/app/';

  //import from core
  if(file_exists($file.'core/'. $class . '.php'))
    require_once $file.'core/'. $class . '.php';

  // imports classes from controllers
  else if (file_exists($file.'controllers/'. $class . '.php'))
    require_once $file.'controllers/'. $class . '.php';

  //impor from
  else if (file_exists($file.'models/'. $class . '.php'))
      require_once $file.'models/'. $class . '.php';
});

  //require_once 'core/app.php';
  //require_once 'core/controller.php';
  //require_once 'core/database.php';
  //require_once 'controllers/homeController.php';
 ?>
