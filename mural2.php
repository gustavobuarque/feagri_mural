<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="mural.css">
<?php 
/*
define('_JEXEC', 1);


define('DS', DIRECTORY_SEPARATOR);
define('JPATH_BASE', '../../../');

require_once JPATH_BASE . DS . 'includes' . DS . 'defines.php';
require_once JPATH_BASE . DS . 'includes' . DS . 'framework.php';

$app = JFactory::getApplication('site');
$app->initialise();
//$document =& JFactory::getDocument();
//$document->addStyleSheet(JURI::base()."templates/simplesimon/css/bootstrap-min.css");
*/?>


<?php
$ano = date("Y");
$data = date('D');
$hora = date('H:i');
$mes = date('n');
switch ($data) {
  case 'Mon':
    $salaaula_semana='1segunda';
    $dia_semana='Segunda-feira';
    break;
  case 'Tue':
    $salaaula_semana='2terça';
    $dia_semana='Terça-feira';
    break;
  case 'Wed':
    $salaaula_semana='3quarta';
    $dia_semana='Quarta-feira';
    break;
  case 'Thu':
    $salaaula_semana='4quinta';
    $dia_semana='Quinta-feira';
    break;
  case 'Fri':
    $salaaula_semana='5sexta';
    $dia_semana='Sexta-feira';
    break;
  default:
    $salaaula_semana='5sábado';
    $dia_semana='Sábado';
    break;
}
?>
</head>
<body>
    <h1 class="diatitle"><?php echo $dia_semana; ?></h1>
    <ul id="header">
      <li>            
        <div class="h"><h3>Horários</h3></div>
        <div class="s"><h3>Salas</h3></div>
        <div class="t"><h3>Turmas</h3></div>
        <div class="di"><h3>Disciplinas</h3></div>
        <div class="do"><h3>Docentes</h3></div>
      </li>
    </ul>
    <ul id="ticker">
      
    </ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="functions.js"></script>

 </body>
 </html>