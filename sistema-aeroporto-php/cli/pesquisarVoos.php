<?php

function pesquisarVoos(
    AgenciaViagens $agencia,
    InterAirlines $interAirlines
): void {

    echo PHP_EOL;
    echo "========== PESQUISAR VOOS ==========" . PHP_EOL;

    $origem = readline("Origem: ");
    $destino = readline("Destino: ");

    $voos = $agencia->pesquisarVoos(
        $interAirlines,
        $origem,
        $destino
    );

    if (empty($voos)) {
        echo PHP_EOL;
        echo "Nenhum voo encontrado." . PHP_EOL;
        return;
    }

    echo PHP_EOL;
    echo "Voos encontrados:" . PHP_EOL;
    echo "----------------------------------------" . PHP_EOL;

    foreach ($voos as $voo) {

        $companhia = $voo->getCompanhiaAerea();

        echo "ID: " . $voo->getId() . PHP_EOL;
        echo "Companhia: " . $companhia->getNome() . PHP_EOL;
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