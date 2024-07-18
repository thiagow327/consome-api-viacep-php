<?php

namespace App\WebService;

class ViaCEP
{
    /**
     * metodo responsavel por consultar um cep no viacep
     * @param string $cep
     * @return array
     */
    public static function consultarCEP($cep)
    {
        // inicia o curl
        $curl = curl_init();

        // configuracoes do curl
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://viacep.com.br/ws/' . $cep . '/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false,  // Desabilita a verificação SSL
        ]);

        // response
        $response = curl_exec($curl);

        // fecha a conexao aberta
        curl_close($curl);

        // converte o json para array
        $array = json_decode($response, true);

        // retorna o conteudo em array
        return isset($array['cep']) ? $array : null;
    }
}
