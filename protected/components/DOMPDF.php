// DOMPDF_autoload
Yii::registerAutoloader(function($class) {
  $filename = DOMPDF_INC_DIR . "/" . mb_strtolower($class) . ".cls.php";
  
  if ( is_file($filename) )
    require_once($filename);
});


require Yii::getPathOfAlias('application.extensions.pdf.dompdf') . '/dompdf_config.inc.php';