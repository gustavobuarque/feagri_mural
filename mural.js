
/*
Mostrar 10 linhas a cada X minutos
Ocultar linhas quando a hora final menos 1 hora for igual a hora corrente
 */

/*Função para dar refresh na página*/
  function refreshAt(hours, minutes, seconds) {
    var now = new Date();
    var then = new Date();

    if(now.getHours() > hours ||
       (now.getHours() == hours && now.getMinutes() > minutes) ||
        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
        then.setDate(now.getDate() + 1);
    }
    then.setHours(hours);
    then.setMinutes(minutes);
    then.setSeconds(seconds);

    var timeout = (then.getTime() - now.getTime());
    setTimeout(function() { window.location.reload(true); }, timeout);
}

function loadJSON(){
    var url = "salaaula.json";
    //var url = "http://www.feagri.unicamp.br/portal/templates/simplesimon/includes/sala_aula.php"
    $.getJSON(url, function(result){
      renderList(result);
      InfiniteRotator.init();  
      refreshAt(06,00,00); //Will refresh the page at 8:00pm on Monday UTC or 3:00pm EST
    }); // end getJSON 

  } // end loadJSON


  function renderList(result){

    $("#ticker").empty();
    // Listando cada cliente encontrado na lista...
    
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


  var InfiniteRotator = 
  {
    init: function()
    {
      //initial fade-in time (in milliseconds)
      var initialFadeIn = 1000;
      
      //interval between items (in milliseconds)
      var itemInterval = 10000;
      
      //cross-fade time (in milliseconds)
      var fadeTime = 2500;
      
      //count number of items
      var numberOfItems = $('#ticker li').length;

      //set current item
      var currentItem = 1;
      var currentGroup = 0;
      var untilGroup = 11;
      var nInteracoes = Math.ceil(numberOfItems/10);

      //show first item
      $('#ticker li:nth-child(n+'+ currentItem +')').fadeIn(fadeTime).nextUntil('#ticker li:nth-of-type(n+'+ untilGroup +')').fadeIn(fadeTime);
      
      //loop through the items    
      var infiniteLoop = setInterval(function(){

        $('#ticker li:nth-child(n+'+ currentItem +')').fadeOut(fadeTime).nextUntil('#ticker li:nth-of-type(n+'+ untilGroup +')').fadeOut(fadeTime);

        if(currentItem > nInteracoes-1){
          currentGroup = 0;
          untilGroup = 11; 
          currentItem = 1;
          $('#ticker li').removeAttr('style');
          

        }else{
          untilGroup += 10;
          currentGroup += 10;
          currentItem++
          //console.log("cg: "+currentGroup +" nI: "+numberOfItems+" ug: "+untilGroup + " cI: "+currentItem); 
        }
        $('#ticker li:nth-of-type('+currentGroup+'n)').nextUntil('#ticker li:nth-of-type(n+'+untilGroup+')').fadeIn(fadeTime);

      }, itemInterval); 
    } 
  };

  loadJSON();