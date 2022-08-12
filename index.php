<?php

function removeCaracteresNaoNumericos($valor)
{
    return preg_replace("/[^0-9]/", "", $valor);
}

function realizaBusca($cep)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://viacep.com.br/ws/$cep/json/");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl); 
    return json_decode($output);
     
}
$cep = "02990010";
$cep = removeCaracteresNaoNumericos($cep);
$resultado = realizaBusca($cep);
if ($resultado == null) {
   echo "Erro ao buscar este CEP";
}else {
    echo $resultado;
}
