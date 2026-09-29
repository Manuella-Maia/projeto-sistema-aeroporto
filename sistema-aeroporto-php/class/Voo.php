<?php
    /**
     * Voo
     * Representa um voo disponibilizado por uma companhia aérea.
     *
     * Armazena informações como origem, destino, horários, aeronave,
     * capacidade, valor, companhia aérea e assentos disponíveis.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     */

    class Voo{
        private int $id;
        private string $origem;
        private string $destino;
        private string $dataHoraPartida;
        private string $dataHoraChegada;
        private string $aeronave;
        private int $capacidade;
        private float $valor;

        // Relação com outras classes
        private CompanhiaAerea $companhiaAerea;
        private array $assentos;

        public function __construct(
            string $id,
            string $origem,
            string $destino,
            string $dataHoraPartida,
            string $dataHoraChegada,
            string $aeronave,
            int $capacidade,
            float $valor,
            CompanhiaAerea $companhiaAerea,// espera um objeto da classe CompanhiaAerea
            array $assentos
        ) {
            // inicialização

            $this->id = $id;
            $this->origem = $origem;
            $this->destino = $destino;
            $this->dataHoraPartida = $dataHoraPartida;
            $this->dataHoraChegada = $dataHoraChegada;
            $this->aeronave = $aeronave;
            $this->capacidade = $capacidade;
            $this->valor = $valor;
            $this->companhiaAerea = $companhiaAerea;
            $this->assentos = $assentos;
        }

        // Getters -> mostrar
        public function getId(): string{
            return $this->id;
        }

        // Setters -> configurar
        public function setId(string $id): void{
            $this->id = $id;
        }

        public function getOrigem(): string{
            return $this->origem;
        }

        public function getDestino(): string{
            return $this->destino;
        }

        public function getDataHoraPartida(): string{
            return $this->dataHoraPartida;
        }

        public function getDataHoraChegada(): string{
            return $this->dataHoraChegada;
        }

        public function getAeronave(): string{
            return $this->aeronave;
        }

        public function getCapacidade(): int{
            return $this->capacidade;
        }

        public function getValor(): float{
            return $this->valor;
        }

        public function getCompanhiaAerea(): CompanhiaAerea{
            return $this->companhiaAerea;
        }

        public function getAssentos(): array{
            return $this->assentos;
        }

        public function getAssento(string $codigo): ?Assento{
            foreach ($this->assentos as $assento) {//laço de repetição
                if ($assento->getCodigo() === $codigo) {
                    return $assento;
                }
            }

            return null;
        }

        public function getAssentosDisponiveis(): array{
            $disponiveis = [];

            foreach ($this->assentos as $assento) {//laço de repetição 
                if (!$assento->estaOcupado()) {
                    $disponiveis[] = $assento;
                }
            }

            return $disponiveis;
        }
    }
?>