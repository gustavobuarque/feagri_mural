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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
/*
Mostrar 10 linhas a cada X minutos
Ocultar linhas quando a hora final menos 1 hora for igual a hora corrente
 */



jQuery(document).ready(function(){
//$("#resultado").empty();
//var timeDelay = 5000;
//var p1avez = 't';
  //setInterval(loadJSON,timeDelay);
  //setTimeout(loadJSON,timeDelay);
  loadJSON();


  

  function loadJSON(){
    var url = "salaaula.json";
    $.getJSON(url, function(result){
      renderList(result);
    }); // end getJSON 

    //   $.ajax({
    //         type: "GET",
    //         //url: "/portal/templates/simplesimon/includes/sala_aula.php",
    //         url: "salaaula.json",
    //         dataType: "json",
    //         success: function (result, jqXHR) {
    //             return result;
    //             });
    //         },
    //         error: function (jqXHR, status) {
    //             // Exibir mensagem de erro, caso aconteça...
    //             $("#resultado").html("<center>O servidor não conseguiu processar a consulta...</center>");
    //         }

    //   });
    // renderList();
  } // end loadJSON

  function renderList(result){

    $("#ticker").empty();
    // Listando cada cliente encontrado na lista...
    var nItens = result.length;
    console.log(Math.ceil(nItens));
    $.each(result,function(i, aula){
        var listHtml = '<li>';
        listHtml += '<div class="h">' + aula.horario + '</div>';
        listHtml += '<div class="s">' + aula.sala + '</div>';
        listHtml += '<div class="t">' + aula.turma + '</div>';
        listHtml += '<div class="di">' + aula.sigla +' - '+ aula.disciplina + '</div>';
        listHtml += '<div class="do">' + aula.foto + aula.docente + '</div>';
        listHtml += '</li>';
      
      // if ( aula.horario.substring(0, 2) > h){ 
      //   if ( aula.horario.substring(10,12) == h ){
      //       alert('i'+aula.horario.substring(0, 2));
      //       alert('f'+aula.horario.substring(10, 12)); 
      //    return true;
      //  }
      // }
      $("#ticker").append(listHtml);
      
    
    }); // end each 

  } //end renderList

  function ticker(tempo){
    var j = 10;
    var nItens = $('#ticker li').length;
    setTimeout(function(){
      $('#ticker li:nth-child(-n+'+j+')').fadeOut( 800, function() {
        
        //$('#ticker li:first').detach().appendTo('ul#ticker').removeAttr('style'); 
        //$('#ticker li:first').detach().removeAttr('style'); 
        //$(this).addClass('hide'); 
        j++;
      });
      
    ticker(tempo);

    }, tempo);
  
  }
  var tempo = 4000;

  ticker(tempo);

});
</script>
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

      <script>
      
  </script>

 </body>
 </html>