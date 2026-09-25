//  # logica do menu principal com question

import {questionInt } from "readline-sync";
import { menuAeroporto } from "./menuAeroporto.js";
import { menuAgencia } from "./menuAgencia.js";

let opcao = -1;
// let opcao = ''; o Js na hora de comparar string com numero no while transforma a string em 0. Entao 0 != 0 = false. Por isso da errado

while(opcao != 0){
    
    console.log(`\n===== Sistema de Viagens =====
1 - 🏢 Acessar Agência de Viagens
2 - 🛫 Acessar Aeroporto / Companhia Aérea
0 - 🔚 Sair\n`);

            console.log('Seja Bem-Vindo (a) !\n')

            opcao = questionInt('Qual sistema deseja acessar ? Digite o numero correspondente : ');
            switch(opcao){
                
                case 1 :
                    menuAgencia();
                    break;
                case 2 :
                    menuAeroporto();
                    break;
                case 0 :
                    // pode colocar for e settime para dar estetica dos pontinhos
                    console.log('\n👋 Saindo....Ate logo');
                    break;
                default : 
                    console.log('❌ Opcao invalida ! Digite novamente.\n');
                    break;          
            }
}