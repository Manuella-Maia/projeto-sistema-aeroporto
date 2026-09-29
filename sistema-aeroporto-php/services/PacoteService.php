<?php

    /**
     * PacoteService
     * Serviço responsável pelas operações relacionadas aos pacotes de viagem.
     *
     * Coordena a associação de passagens aos pacotes de viagem.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     */

    class PacoteService{
        
        public function adicionarPassagem(Pacote $pacote, Passagem $passagem): void {
            $pacote->adicionarPassagem($passagem);
        }
    }
?>