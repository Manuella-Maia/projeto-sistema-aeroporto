<?php

    class Passagem{
        private int $id;
        private Voo $voo;//espera receber um objeto instanciado da classe Voo
        private Assento $assento;//espera receber um objeto instanciado da classe Assento
        private string $status = "ativa";

        public function __construct(
            string $id,
            Voo $voo,
            Assento $assento
        ) {
            //inicialização
            $this->id = $id;
            $this->voo = $voo;
            $this->assento = $assento;
        }

        public function getId(): int{
            return $this->id;
        }

        public function getVoo(): Voo{
            return $this->voo;
        }

        public function getAssento(): Assento{
            return $this->assento;
        }


        public function getStatus(): string{
            return $this->status;
        }

        public function cancelar(): void{
            $this->status = "cancelada";
            $this->assento->liberar();
        }
    }
?>