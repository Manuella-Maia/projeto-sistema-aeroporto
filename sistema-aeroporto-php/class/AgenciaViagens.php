<?php
    /**
    * AgenciaViagens
    * Representa uma agência de viagens que utiliza a plataforma InterAirlines.
    *
    * Armazena os dados da agência e permite realizar operações de pesquisa
    * de voos por meio da plataforma intermediadora.
    *
    * @package SistemaAeroporto
    * @author Manuella Maia Lopes
    * @version 1.0.0
    * @since 1.0.0
    */
    
    class AgenciaViagens{
        private int $id;
        private string $nome; 
        private string $cnpj;
        private string $email;
        private string $telefone;

        public function __construct(
            string $id,
            string $nome,
            string $cnpj,
            string $email,
            string $telefone
        ){
            //inicialização

            $this->id = $id;
            $this->nome = $nome;
            $this->cnpj = $cnpj;
            $this->email = $email;
            $this->telefone = $telefone;
        }

        public function getId(): int{
            return $this->id;
        }

        public function getNome(): string{
            return $this->nome;
        }

         public function getCnpj(): string{
            return $this->cnpj;
        }

        public function getEmail(): string{
            return $this->email;
        }

        public function getTelefone(): string{
            return $this->telefone;
        }

        public function pesquisarVoos(
            InterAirlines $interAirlines,
            string $origem,
            string $destino
        ): array{
            //chama o objeto da interAirlines para fazer a busca
            return $interAirlines->pesquisarVoos($origem, $destino);
        }

        // public function comprarPassagem(
        //     Voo $voo,
        //     Assento $assento
        // ): Passagem{//deve retornar um objeto da  classe Passagem

        //     return new Passagem(1, $voo, $assento);
        // }
    }









?>