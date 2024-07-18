<?php

require __DIR__ . '/vendor/autoload.php';

// dependencias
use \App\WebService\ViaCEP;

// verifica a existencia do cep
if (!isset($argv[1])) {
    die("CEP não definido\n");
}

// executa a consulta de ceps
$dadosCEP = ViaCEP::consultarCEP($argv[1]);

// imprime o resultado
var_dump($dadosCEP);
