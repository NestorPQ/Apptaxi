<?php
function filtrar($cadenaEntrada)
{
  $caracteresProhibidos = array("<", ">", "{", "}", "?", "/", "[", "]");
  $caracteresReeplazar = array("");

  return str_replace($caracteresProhibidos, $caracteresReeplazar, $cadenaEntrada);
}

function soloNumero($cadena)
{

  if (preg_match('/^[0-9]+$/', $cadena)) {
    return (string) $cadena;
  } else {
    return false;
  }
}

function eliminarNoNumeros($cadena){
  return preg_replace("/[^0-9]/", "", $cadena);
}

// echo filtrar("<h1>Hola</h1>");
// echo "<br>";
// echo soloNumero("34563456");
// echo "<br>";
// echo eliminarNoNumeros("345g643fg645fg734g{+.{+");
