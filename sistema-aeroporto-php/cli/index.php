<?php

    /**
     * Ponto de entrada da interface CLI do sistema.
     *
     * Inicializa os dados e os objetos principais e disponibiliza
     * o menu de operações da agência de viagens.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     */

    require_once __DIR__ . '/../class/AgenciaViagens.php';
    require_once __DIR__ . '/../class/Assento.php';
    require_once __DIR__ . '/../class/CompanhiaAerea.php';
    require_once __DIR__ . '/../class/InterAirlines.php';
    require_once __DIR__ . '/../class/Voo.php';
    require_once __DIR__ . '/../class/Passagem.php';
    require_once __DIR__ . '/../class/Pacote.php';

    require_once __DIR__ . '/../services/PassagemService.php';
    require_once __DIR__ . '/../services/PacoteService.php';

    require_once __DIR__ . '/../data/carregarDados.php';

    require_once __DIR__ . '/pesquisarVoos.php';
    require_once __DIR__ . '/comprarPassagem.php';
    require_once __DIR__ . '/consultarPacotes.php';


    $agencia = new AgenciaViagens(
        1,
        "Agência Horizonte Viagens",
        "12.345.678/0001-90",
        "contato@horizonteviagens.com",
        "31999999999"
    );

    $interAirlines = carregarInterAirlines();


    while (true) {

        echo PHP_EOL;
        echo "========================================" . PHP_EOL;
        echo "       AGÊNCIA HORIZONTE VIAGENS" . PHP_EOL;
        echo "========================================" . PHP_EOL;
        echo VERDE . PHP_EOL;
        echo "1 - Pesquisar voos" . PHP_EOL;
        echo "2 - Comprar passagem" . PHP_EOL;
        echo "3 - Consultar pacotes" . PHP_EOL;
        echo "0 - Sair" . PHP_EOL;
        echo RESET . PHP_EOL;
        echo "========================================" . PHP_EOL;

        $opcao = readline("Escolha uma opção: ");

        switch ($opcao) {

            case "1":
                pesquisarVoos($agencia, $interAirlines);
                break;

            case "2":
                comprarPassagem($agencia, $interAirlines);
                break;

            case "3":
                consultarPacotes();
                break;

            case "0":
                echo PHP_EOL . "Encerrando sistema..." . PHP_EOL;
                exit;

            default:
                echo PHP_EOL . VERMELHO . "Opção inválida." . RESET . PHP_EOL;
        }
    }

?>