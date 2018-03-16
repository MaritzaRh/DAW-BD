function getRequestObject() {
  // Asynchronous objec created, handles browser DOM differences

  if(window.XMLHttpRequest) {
    // Mozilla, Opera, Safari, Chrome IE 7+
    return (new XMLHttpRequest());
  }
  else if (window.ActiveXObject) {
    // IE 6-
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else {
    // Non AJAX browsers
    return(null);
  }
}


function sendRequest(){
    
     let JQUERY = 1;
   
   if(JQUERY == 1) {
       
        $.get("ssajax.php", { pattern: document.getElementById('Address').value })
            .done(function( data ) {
                var ajaxResponse = document.getElementById('ajaxResponse');
                ajaxResponse.innerHTML = data;
                ajaxResponse.style.visibility = "visible";
         });
         
        console.log("Fin AJAX con jquery");
       
   } else {
   request=getRequestObject();
   if(request!=null)
   {
     var userInput = document.getElementById('Address');
     var url='ssajax.php?pattern='+userInput.value;
     request.open('GET',url,true);
     request.onreadystatechange = 
            function() { 
                if((request.readyState==4)){
                    // Asynchronous response has arrived
                    var ajaxResponse=document.getElementById('ajaxResponse');
                    ajaxResponse.innerHTML=request.responseText;
                    ajaxResponse.style.visibility="visible";
                }     
            };
     request.send(null);
   }
   }
}
function LettersInNames(){
         console.log("Fin AJAX con jquery");
        $.get("ssajax1.php", { pattern: document.getElementById('letters').value })
            .done(function( data ) {
                var ajaxResponse = document.getElementById('letterResponse');
                letterResponse.innerHTML = data;
                letterResponse.style.visibility = "visible";
         });
}

function selectValue() {

    console.log("selectValue");
   var list=document.getElementById("list");
   var userInput=document.getElementById("Address");
   var ajaxResponse=document.getElementById('ajaxResponse');
   userInput.value=list.options[list.selectedIndex].text;
   ajaxResponse.style.visibility="hidden";
   userInput.focus();
}
function selectValue2() {

    console.log("selectValue2");
   var list=document.getElementById("list2");
   var userInput=document.getElementById("letters");
   var ajaxResponse=document.getElementById('lettersResponse');
   userInput.value=list.options[list.selectedIndex].text;
   letterResponse.style.visibility="hidden";
   userInput.focus();
}
