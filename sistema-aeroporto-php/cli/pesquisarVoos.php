<?php

    /**
     * pesquisarVoos
     * 
     * Interface CLI para pesquisa de voos.
     *
     * Solicita ao usuário a origem e o destino e apresenta
     * os voos correspondentes disponibilizados pela InterAirlines.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     * @param AgenciaViagens $agencia
     * @param InterAirlines $interAirlines
     * @return void
     */

    require_once __DIR__ .'/cores.php';

    function pesquisarVoos(AgenciaViagens $agencia, InterAirlines $interAirlines): void {

        $coresCompanhias = [
            "AZ" => CIANO,
            "LA" => VERMELHO,
            "TP" => VERDE,
            "GOL" => AMARELO,
        ];

        echo PHP_EOL;
        echo VERDE . "========== PESQUISAR VOOS ==========" . RESET . PHP_EOL;
        echo PHP_EOL;

        $origem = readline("Origem: ");
        $destino = readline("Destino: ");

        $voos = $agencia->pesquisarVoos(
            $interAirlines,
            $origem,
            $destino
        );

        if (empty($voos)) {
            echo PHP_EOL;
            echo VERMELHO . "Nenhum voo encontrado." . RESET . PHP_EOL;
            return;
        }

        echo PHP_EOL;
        echo "Voos encontrados:" . PHP_EOL;
        echo "----------------------------------------" . PHP_EOL;
        echo PHP_EOL;

        foreach ($voos as $voo) {

            $companhia = $voo->getCompanhiaAerea();

            $codigoCompanhia = $companhia->getCodigo();

            $corCompahia = $coresCompanhias[$codigoCompanhia] ?? RESET;

            echo "ID: " . $voo->getId() . PHP_EOL;
            echo "Companhia: " . $corCompahia . $companhia->getNome() . RESET . PHP_EOL;
            echo "Origem: " . $voo->getOrigem() . PHP_EOL;
            echo "Destino: " . $voo->getDestino() . PHP_EOL;
            echo "Partida: " . $voo->getDataHoraPartida() . PHP_EOL;
            echo "Chegada: " . $voo->getDataHoraChegada() . PHP_EOL;
            echo "Aeronave: " . $voo->getAeronave() . PHP_EOL;

            echo "Valor: R$ "
                . number_format(
                    $voo->getValor(),
                    2,
                    ',',
                    '.'
                )
                . PHP_EOL;

            echo "Assentos disponíveis: "
                . count($voo->getAssentosDisponiveis())
                . PHP_EOL;

            echo "----------------------------------------" . PHP_EOL;
        }
    }
?>