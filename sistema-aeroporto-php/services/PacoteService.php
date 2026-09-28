<?php

    class PacoteService{
        
        public function adicionarPassagem(Pacote $pacote, Passagem $passagem): void {
            $pacote->adicionarPassagem($passagem);
        }
    }
?>