<?php

    /**
     * Pacote
     * Representa um pacote de viagem associado a passagens aéreas.
     *
     * Mantém as passagens incluídas no pacote e controla seu estado,
     * permitindo a associação e o cancelamento do pacote.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     */

    class Pacote{
        private int $id;
        private string $nome;
        private array $passagens = [];
        private string $status = "ativo";

        public function __construct(
            string $id,
            string $nome
        ) {
            $this->id = $id;
            $this->nome = $nome;
        }

        public function getId(): int{
            return $this->id;
        }

        public function getNome(): string{
            return $this->nome;
        }

        public function getPassagens(): array{
            return $this->passagens;
        }

        public function getStatus(): string{
            return $this->status;
        }

        public function adicionarPassagem(Passagem $passagem): void{
            $this->passagens[] = $passagem;
        }

        public function cancelar(): void{
            $this->status = "cancelado";
        }
    }
?>