<?php

    /**
     * carregarInterAirlines
     * 
     * Carregamento e inicialização dos dados do sistema.
     *
     * Responsável por transformar os dados armazenados nos arquivos
     * de dados em objetos de domínio e estabelecer seus relacionamentos,
     * disponibilizando uma instância configurada da plataforma InterAirlines.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     * @return InterAirlines
     */


    require_once __DIR__ . '/voos.php';
    require_once __DIR__ . '/companhias.php';

    require_once __DIR__ . '/../class/Assento.php';
    require_once __DIR__ . '/../class/CompanhiaAerea.php';
    require_once __DIR__ . '/../class/Voo.php';
    require_once __DIR__ . '/../class/InterAirlines.php';


    function carregarInterAirlines(): InterAirlines{
        global $companhias;
        global $voos;

        $interAirlines = new InterAirlines();

        $companhiasObjetos = [];


        // 1. Carrega as companhias
        foreach ($companhias as $dadosCompanhia) {

            $companhia = new CompanhiaAerea(
                $dadosCompanhia["id"],
                $dadosCompanhia["nome"],
                $dadosCompanhia["codigo"]
            );

            $companhiasObjetos[$dadosCompanhia["codigo"]] = $companhia;

            $interAirlines->adicionarCompanhia($companhia);
        }


        // 2. Carrega os voos
        foreach ($voos as $dadosVoo) {

            $codigoCompanhia = $dadosVoo["companhiaCodigo"];

            if (!isset($companhiasObjetos[$codigoCompanhia])) {
                continue;
            }

            $companhia = $companhiasObjetos[$codigoCompanhia];


            // 3. Converte os assentos em objetos
            $assentos = [];

            foreach ($dadosVoo["assentos"] as $codigoAssento) {

                $ocupado = in_array(
                    $codigoAssento,
                    $dadosVoo["assentosOcupados"]
                );

                $assentos[] = new Assento(
                    $codigoAssento,
                    $ocupado
                );
            }


            // 4. Cria o objeto Voo
            $voo = new Voo(
                $dadosVoo["id"],
                $dadosVoo["origem"],
                $dadosVoo["destino"],
                $dadosVoo["dataHoraPartida"],
                $dadosVoo["dataHoraChegada"],
                $dadosVoo["aeronave"],
                $dadosVoo["capacidade"],
                $dadosVoo["valor"],
                $companhia,
                $assentos
            );


            // 5. Relaciona o voo com a companhia
            $companhia->adicionarVoo($voo);
        }

        return $interAirlines;
    }
?>