function Estudiante(nombre) {
 	this.nombre = nombre;   
}
                
var nombre = prompt("Escribe tu nombre:");
var estudiante = new Estudiante(nombre);
            
Estudiante.prototype.bienvenido = function(){
	alert('Hola, ¡bienvenido, '+nombre+'!'); 
}
            
Estudiante.prototype.informacion = function(){
	var dia = new Date(); 
    alert('El día de hoy es '+dia.getDate());
}
                        
estudiante.bienvenido();
estudiante.informacion();



var text = document.querySelector('#answer');
var problema = document.querySelector('#problema');
var button = document.querySelectorAll("button");

for (var i = 0; i < button.length; i++) {
  button[i].addEventListener("click", function(x) {
    selection(x.toElement.name);
  });
}


function promedios(arr) {

  var promedios = new Array();
  var suma = 0;

  for (var i = 0; i < arr.length; i++) {
    for (var j = 0; j < arr[i].length; j++) {
      suma += arr[i][j];

    }
    suma = suma / arr[i].length;
    promedios.push(Math.floor(suma));
    suma = 0;
  }
  return promedios;

  function contador(arr) {
    var negativos = new Array();
    var ceros = new Array();
    var positivos = new Array();
    var all = new Array();

    arr.forEach(function(val) {
      if (val < 0)
        negativos.push(val);
      else if (val === 0) {
        ceros.push(val);
      } else {
        positivos.push(val);
      }
    });

    all.push(negativos.length);
    all.push(ceros.length);
    all.push(positivos.length);
    var respuesta = "Negativos: " + all[0] + "<br>Ceros :" + all[1] + "<br> Positivos :" + all[2];

    return respuesta;

  }
}

function inverso(num) {
  var digito;
  var total = 0;
  while (num > 0) {
    digito = num % 10;
    num /= 10;
    num = Math.floor(num);
    total = total * 10 + digito;
  }
  return total;
}


function contador(arr) {
  var negativos = new Array();
  var ceros = new Array();
  var positivos = new Array();
  var all = new Array();

  arr.forEach(function(val) {
    if (val < 0)
      negativos.push(val);
    else if (val === 0) {
      ceros.push(val);
    } else {
      positivos.push(val);
    }
  });

  all.push(negativos.length);
  all.push(ceros.length);
  all.push(positivos.length);
  var respuesta = "Negativos: " + all[0] + "<br> Ceros :" + all[1] + "<br> Positivos :" + all[2] +"<br><br>";

  return respuesta;

}

function posee(x) {
  if (x.includes("i")) {
    return true;
  } else {
    return false;
  }
}

function analize() {
  if (posee(this.palabra)) {
    alert("N")
  } else {
    alert("S");
  }
}


function Oracion(palabra) {
  this.palabra = palabra;
  this.tiene = posee;
  this.analiza = analize;
}



function selection(name) {
  switch (name) {
    case "button":
      var letras = document.querySelector('#sentencia').value;
      var sentencia = new Oracion(letras);
      sentencia.analiza();

      break;
      break;
    case "button1":
      problema.innerHTML = "Entrada: un número pedido con un '/prompt/'. '/Salida/': Una tabla con los números del 1 al número dado con sus cuadrados y '/cubos. Utiliza document.write'/ para producir la salida "
      var tt;
      tt="<table><tr><th>Numero   </th><th>Cuadrado   </th><th>Cubo   </th></tr>";
      var num = prompt("Inserta el numero");
      for (var i = 1; i <= num; i++) {
        var y = i * i;
        tt = (tt + "<tr><td> " + i + " </td><td> " + y + " </td>");
        y *= i;
        tt = (tt + "<td> "+ y + " </td></tr>");
      }
      tt = tt + "</table>";
      text.innerHTML = tt;
      break;
    case "button2":
      problema.innerHTML = "Entrada: Usando un prompt se pide el resultado de la suma de 2 números generados de manera aleatoria. Salida: La página debe indicar si el resultado fue correcto o incorrecto, y el tiempo que tardó el usuario en escribir la respuesta."
      var limit = 100;
      var num_1 = Math.floor(Math.random() * limit);
      var num_2 = Math.floor(Math.random() * limit);
      var total = num_1 + num_2;
      var date = new Date();

      var seconds = date.getSeconds();
      var answer = prompt("Inserta la suma de " + num_1 + " y " + num_2);
      var date2 = new Date();
      var rsec = date2.getSeconds();

      var totalTime = rsec - seconds;
      if (answer == total) {
        alert("Correcto y tardaste: " + totalTime + " segundos");
      } else {
        alert('Incorrecto y tardaste: ' + totalTime + " segundos");
      }

      break;
    case "button3":

      problema.innerHTML = "Función: contador. Parámetros: Un arreglo de números. Regresa: La cantidad de números negativos en el arreglo, la cantidad de 0's, y la cantidad de valores mayores a 0 en el arreglo.<br>arr = [1, 0, 0, -3, -10, -1, 4, 5]<br>arr = [2, 0, 0, 0, 0, -1, 3, 9]"
      var arr = [1, 0, 0, -3, -10, -1, 4, 5];
      text.innerHTML = (contador(arr));

      var arr = [2, 0, 0, 0, 0, -1, 3, 9];
      text.innerHTML = (text.innerHTML + "\n" + contador(arr));


      break;


    case "button4":
      problema.innerHTML = "Función: promedios. Parámetros: Un arreglo de arreglos de números. Regresa: Un arreglo con los promedios de cada uno de los renglones de la matriz. <br> arreglo = [[10, 3, 8],[8, 9, 8]]<br> arreglo = [[10, 9, 9, 9, 8],[8, 6, 5, 4, 9, 8]]"
      var arreglo = [
        [10, 3, 8],
        [8, 9, 8]
      ];
      text.innerHTML = (promedios(arreglo));
      var arreglo = [
        [10, 9, 9, 9, 8],
        [8, 6, 5, 4, 9, 8]
      ];
      text.innerHTML = (text.innerHTML + "<br>" + promedios(arreglo));

      break;
    case "button5":
      problema.innerHTML = "Función: inverso. Parámetros: Un número. Regresa: El número con sus dígitos en orden inverso. <br>Inverso(12345) <br>Inverso(23456)"
      text.innerHTML = (inverso(12345));
      text.innerHTML = text.innerHTML + "<br>" + inverso(23456);
      break;

    default:

  }
}
