<?php

function promedios($arr) {
  $suma = 0;

  for ($i = 0; $i < count($arr); $i++) {
      $suma += $arr[$i];
    }
    $promedio = $suma/count($arr);

  return $promedio;
}

function printar($arr){
  sort($arr);
  $all="";
    $clength=count($arr);
    for($x=0;$x<$clength;$x++)
      {
      $all= $all.$arr[$x]."  ";
      }
  return $all;
}

function reverse($arr){
  sort($arr);
  $all="";
  for ($i=count($arr)-1; $i >=0 ; $i--) {
    $all= $all.$arr[$i]."  ";
  }
    return $all;

}
  function mediana($arr){
    sort($arr);
    $med = ceil(count($arr)/2);
    return $arr[$med];
  }

  function lista($arr){
    $lista = "<h4>Lista del arreglo</h4><ul><li><ul>";
      for ($i=0; $i <count($arr) ; $i++) {
        $lista= $lista."<li>".$arr[$i]."</li>";
      }
      $lista = $lista."</ul></li><li>Promedio: ".promedios($arr)."</li>";
        $lista = $lista."<li>Mediana: ".mediana($arr)."</li>";
          $lista = $lista."<li>Ordenado : ".printar($arr)."</li>";
            $lista = $lista."<li>Inverso: ".reverse($arr)."</li>";
    $lista = $lista."</ul>";

    return $lista;

  }

function tablas($numeros){
    $tabla = "<table><thead><th>Numero</th><th>Cuadrado</th><th>Cubo</th></thead><tbody>";
    for ($i=1; $i <= $numeros; $i++) {
      $tabla = $tabla."<tr><td>".$i."</td> <td>".$i*$i."</td> <td>".$i*$i*$i."</td></tr>";
    }
    $tabla = $tabla."</tbody></table><br />";
    return $tabla;
}

function oracion($oracion){
  if (strpos($oracion, 'i') !== false) {
    return 'True';
  }else{
    return 'False';
  }
}

$arr=array(1,5,6,3,7,9);
$arr2=array(6,16,4,32,2,9);


include("Lab9-DAW.html");




?>