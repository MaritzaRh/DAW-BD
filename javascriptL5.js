document.querySelector("#r").classList.toggle('error');
function validate(){
  let xx = document.querySelector('#good');
  let yy = document.querySelector('#bad');
  if(xx.classList.contains('hidden'))
      xx.classList.toggle('hidden');
  if(yy.classList.contains('hidden'))
      yy.classList.toggle('hidden');
  var password = document.querySelector('#pass1');
  var confirm = document.querySelector('#pass2');
  if(password.value == confirm.value){
    var x = document.querySelector("#bad")
    x.classList.toggle('hidden');
	obtain();
  }
  else {
    var x = document.querySelector("#good")
    x.classList.toggle('hidden');
  }
}

var name ="";
var email ="";
var cel ="";
var pass="";

function obtain(){
  name = document.querySelector('#name').value;
  cel = document.querySelector('#tel').value;
  email = document.querySelector('#email').value;
  pass = document.querySelector('#pass1').value;

  document.querySelector('#wn').textContent+=name;
  document.querySelector('#wc').textContent+=cel;
  document.querySelector('#we').textContent+=email;
  document.querySelector('#wp').textContent+=pass;

  $('.ui.basic.modal')
  .modal('show');
  document.querySelector('#name').value = "";
  document.querySelector('#tel').value = "";
  document.querySelector('#email').value = "";
  document.querySelector('#pass1').value = "";
}

function comprar() {
    var zap = document.getElementById("zap").value;
    var leo = document.getElementById("leo").value;
    var ves = document.getElementById("ves").value;
    
    var subtotal;
    var iva;
    var total;
    
    subtotal = zap*999 + leo*1299 + ves*1999;
    iva = subtotal*0.16;
    total = subtotal+iva;
    
    var div = document.getElementById("cuenta");
    
    div.innerHTML += "<br><strong>Subtotal:</strong> $ "+ subtotal;
    div.innerHTML += "<br><strong>IVA:</strong> $ "+ iva;
    div.innerHTML += "<br><strong>Total:</strong> $ "+ total;
}


function adivina() {
    var nombre = document.getElementById("name").value;
    var edad = document.getElementById("age").value;
    var cumple = document.getElementById("birthday").value;
    
    var miNombre = "Maritza";
    var miEdad = 20;
    var miCumple = "1997-09-10"; 
    
    if((nombre == miNombre) && (edad == miEdad) && (cumple == miCumple)){
        alert('¡Felicidades, ganaste un chocolate!');
    } else { 
        alert('Fallaste, intenta de nuevo');
    }
}

function adivinanza(){
	document.getElementById("uno").addEventListener("mousedown", mouseDown);
	document.getElementById("uno").addEventListener("mouseup", mouseUp);

	function mouseDown() {
		document.getElementById("uno").innerHTML = "El pez";
	}

	function mouseUp() {
		document.getElementById("uno").innerHTML = "Pista";
	}
}
