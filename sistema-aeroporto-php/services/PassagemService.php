<?php
    /**
     * PassagemService
     * Serviço responsável pelo processo de compra de passagens.
     *
     * Coordena a validação e ocupação do assento e a criação
     * de uma nova passagem associada ao voo selecionado.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     */

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