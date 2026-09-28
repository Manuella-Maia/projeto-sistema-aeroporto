<?php

function consultarPacotes(): void
{
    require __DIR__ . '/../data/pacotes.php';

    echo PHP_EOL;
    echo "========== PACOTES DE VIAGEM ==========" . PHP_EOL;

    foreach ($pacotes as $pacote) {

        echo PHP_EOL;
        echo "ID: " . $pacote["id"] . PHP_EOL;
        echo "Destino: " . $pacote["destino"] . PHP_EOL;
        echo "Duração: " . $pacote["duracao"] . " dias" . PHP_EOL;
        echo "Data de início: " . $pacote["dataInicio"] . PHP_EOL;
        echo "Data de término: " . $pacote["dataFim"] . PHP_EOL;

        echo "Preço: R$ "
            . number_format(
                $pacote["preco"],
                2,
                ',',
                '.'
            )
            . PHP_EOL;

        echo "Inclui:" . PHP_EOL;

        foreach ($pacote["inclui"] as $item) {
            echo "  - " . $item . PHP_EOL;
        }

        echo "----------------------------------------" . PHP_EOL;
    }
}