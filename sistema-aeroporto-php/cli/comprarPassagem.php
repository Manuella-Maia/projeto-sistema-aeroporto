<?php

    /**
     * comprarPassagem
     *
     * Interface CLI para compra de passagens.
     *
     * Permite selecionar um voo, consultar os assentos disponíveis
     * e realizar a compra de uma passagem para o assento escolhido.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     * @param AgenciaViagens $agencia
     * @param InterAirlines $interAirlines
     * @return void
     */

    function comprarPassagem(AgenciaViagens $agencia, InterAirlines $interAirlines): void {

        echo PHP_EOL;
        echo "========== COMPRAR PASSAGEM ==========" . PHP_EOL;

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
        echo "Voos disponíveis:" . PHP_EOL;
        echo "----------------------------------------" . PHP_EOL;

        foreach ($voos as $indice => $voo) {

            $companhia = $voo->getCompanhiaAerea();

            echo ($indice + 1) . " - "
                . $voo->getId()
                . " | "
                . $companhia->getNome()
                . " | "
                . $voo->getDataHoraPartida()
                . " | R$ "
                . number_format(
                    $voo->getValor(),
                    2,
                    ',',
                    '.'
                )
                . PHP_EOL;
        }

        echo "----------------------------------------" . PHP_EOL;

        $opcao = (int) readline("Escolha o voo: ");

        if (!isset($voos[$opcao - 1])) {
            echo PHP_EOL . "Voo inválido." . PHP_EOL;
            return;
        }

        $voo = $voos[$opcao - 1];

        echo PHP_EOL;
        echo "========== ASSENTOS ==========" . PHP_EOL;

        $assentos = $voo->getAssentosDisponiveis();

        if (empty($assentos)) {
            echo "Não há assentos disponíveis." . PHP_EOL;
            return;
        }

        foreach ($assentos as $assento) {
            echo $assento->getCodigo() . " ";
        }

        echo PHP_EOL;

        $codigoAssento = readline("Escolha o assento: ");

        $assento = $voo->getAssento($codigoAssento);

        if ($assento === null) {
            echo PHP_EOL . "Assento não encontrado." . PHP_EOL;
            return;
        }

        if ($assento->estaOcupado()) {
            echo PHP_EOL . "Esse assento já está ocupado." . PHP_EOL;
            return;
        }

        try {

            $service = new PassagemService();

            $passagem = $service->comprar(
                $voo,
                $assento
            );

            echo PHP_EOL;
            echo "========== COMPRA REALIZADA ==========" . PHP_EOL;
            echo "Passagem: " . $passagem->getId() . PHP_EOL;
            echo "Voo: " . $voo->getId() . PHP_EOL;
            echo "Companhia: "
                . $voo->getCompanhiaAerea()->getNome()
                . PHP_EOL;
            echo "Assento: "
                . $passagem->getAssento()->getCodigo()
                . PHP_EOL;
            echo "Status: "
                . $passagem->getStatus()
                . PHP_EOL;
            echo "======================================" . PHP_EOL;

        } catch (Exception $e) {

            echo PHP_EOL;
            echo "Erro ao realizar compra: "
                . $e->getMessage()
                . PHP_EOL;
        }
    }
?>