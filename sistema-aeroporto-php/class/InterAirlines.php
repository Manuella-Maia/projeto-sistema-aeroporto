<?php
    /**
     * InterAirlines
     * Representa a plataforma intermediadora de voos do sistema.
     *
     * Centraliza as companhias aéreas cadastradas e disponibiliza operações
     * para pesquisa e consulta dos voos oferecidos por essas companhias.
     *
     * @package SistemaAeroporto
     * @author Manuella Maia Lopes
     * @version 1.0.0
     * @since 1.0.0
     */

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

        /**
         * pesquisarVoos
         * 
         * Pesquisa voos por origem e destino.
         *
         * @param string $origem Cidade de origem do voo.
         * @param string $destino Cidade de destino do voo.
         * @return array Lista de voos encontrados.
         */

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

        /**
         * consultarVoo
         * 
         * Consulta um voo espesífico pelo id e pode retornar um objeto voo contendo suas informações
         *
         * @param int $id
         * @return ?Voo retorna um objeto intanciado da classe Voo
         */


        public function consultarVoo(int $id): ?Voo{//retorna um objeto Voo ou null
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