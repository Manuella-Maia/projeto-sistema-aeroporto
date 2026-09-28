<?php

    class Assento{
        private string $codigo;
        private bool $ocupado;

        public function __construct(
            string $codigo,
            bool $ocupado = false
        ) {
            //inicialização

            $this->codigo = $codigo;
            $this->ocupado = $ocupado;
        }

        public function getCodigo(): string{
            return $this-> codigo;
        }

        public function estaOcupado(): bool{
            //lógica para verificar se um assento está ocupado 
            return $this->ocupado;
        }

        public function ocupar(): void{
            //lógica para marcar assento ocupado
            $this->ocupado = true;
        }

        public function liberar():void{
            $this->ocupado = false;
        }
    }
?>