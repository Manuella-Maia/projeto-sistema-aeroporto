<?php
    /**
     * CompanhiaAerea
     * Representa uma companhia aérea participante da plataforma InterAirlines.
     *
     * Armazena os dados da companhia e mantém os voos disponibilizados
     * por ela na plataforma.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     */

    class CompanhiaAerea{
        private int $id;
        private string $nome;
        private string $codigo;
        private array $voos = [];

        public function __construct(
            string $id,
            string $nome,
            string $codigo
        ) {
            // inicialização

            $this->id = $id;
            $this->nome = $nome;
            $this->codigo = $codigo;
        }

        public function getId(): int{
            return $this->id;
        }

        public function getCodigo(): string{
            return $this->codigo;
        }

        public function getNome(): string{
            return $this->nome;
        }

        public function setNome(string $nome): void{
            $this->nome = $nome;
        }

        public function adicionarVoo(Voo $voo): void{
            $this->voos[] = $voo;//adiciona no final do array
        }

        public function getVoos(): array{
            return $this->voos;
        }
    }
?>