<?php 

define('_JEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);
$path = "/var/www/html/portal/";  //caminho absoluto do site
define('JPATH_BASE', $path);
require_once JPATH_BASE . DS . 'includes' . DS . 'defines.php';
require_once JPATH_BASE . DS . 'includes' . DS . 'framework.php';

$mainframe =& JFactory::getApplication('site');
$db = &JFactory::getDBO();
$mainframe->initialise();

$ano = date("Y");
$data = date('D');
$mes = date('n');
$hora = date('H:i');

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

  
  $salaaula_ativa = 'S';
  $salaaula_ano = $ano;
  if ($mes <= 7) {
    $salaaula_anosemestre = '1';
  } elseif ($mes >7) {
    $salaaula_anosemestre = '2';

  }

        
        $sql= "SELECT DISTINCT s.diasemana, s.horario, s.sigla, s.ano ,d.nome, s.turma, s.responsavel, uc.foto, u.name, s.sala
            FROM #__sala_aula s 
              INNER JOIN #__users_compl uc ON s.responsavel = uc.id
              INNER JOIN #__users u ON s.responsavel = u.id 
            INNER JOIN #__disciplinas d ON s.sigla = d.codigo and s.ano = d.ano
          WHERE s.diasemana='$salaaula_semana' and s.ano='$ano' and s.ativa = 'S'
          ORDER BY s.diasemana, s.horario ";


        $db->setQuery($sql); $sala_aula = $db->loadObjectList();

 $sala = array();
 foreach( $sala_aula as $item) {
      $horario = explode(",",$item->horario);
      $n = count($horario);
      $html =  $horario[0]." até ".$horario[$n-1];

      $caminho = "/portal/";
      $caminhof = substr($item->foto,0,27);
      $thumb1 = '_thumb1/';
      $caminhofoto = ltrim(substr($item->foto,27,30));
      $foto = "<img src=\"$caminho$caminhof$thumb1$caminhofoto\" alt=\"\">";
      
      $sala[] = array( "horario" => $html, "sala" => $item->sala, "turma"=> $item->turma, "sigla"=> $item->sigla, "disciplina"=> $item->nome, "docente"=> $item->name, "foto"=>$foto);

 } 
  echo json_encode($sala,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

  

