<?php

    class PassagemService{
        private int $proximoId = 1;

        public function comprar(Voo $voo, Assento $assento): Passagem {//devolve um objeto instanciado da classe Passagem

            if ($assento->estaOcupado()) {
                throw new Exception("O assento {$assento->getCodigo()} já está ocupado.");
                //encerra a função aqui
            }

            $assento->ocupar();

            $id = $this->proximoId;
            $this->proximoId++;

            return new Passagem($id, $voo, $assento);
        }
    }
?>