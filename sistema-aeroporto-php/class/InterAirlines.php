<?php

    class InterAirlines{
        private array $companhiasAereas = [];

        public function __construct(){
            //inicialização
        }

        public function adicionarCompanhia(CompanhiaAerea $companhia): void{
            //lógica de adicionar companhia no array
            $this->companhiasAereas[] = $companhia;
        }

        public function getCompanhiasAereas(): array{
            return $this->companhiasAereas;
        }

        public function pesquisarVoos(
            string $origem,
            string $destino
        ): array{
            //lógica de buscarr os voos comparando companhias e adicionar no array
            $voosEncontrados = [];

            foreach($this->companhiasAereas as $companhia){
                foreach($companhia->getVoos() as $voo){

                    if($voo->getOrigem() === $origem && $voo->getDestino() === $destino){
                        $voosEncontrados[] = $voo;// adiciona o objeto voo dentro do array de voosEncontrados
                    }
                }
            }

            return $voosEncontrados;
        }

        public function consultarVoo(string $id): ?Voo{//retorna um objeto Voo ou null
            foreach($this->companhiasAereas as $companhia){
                foreach($companhia->getVoos() as $voo){

                    if($voo->getId() === $id){
                        return $voo;
                    }
                
                }
            }

            return null;
        }
    }
?>