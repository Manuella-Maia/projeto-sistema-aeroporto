import {question, questionInt } from "readline-sync";
import { listarPassageiros, listarVoos } from "./modules/aeroporto.js";
import {emitirCartao, realizarCheckin} from './modules/checkin.js'

export function menuAeroporto(){

let opcao = -1;
// let opcao = ''; o Js na hora de comparar string com numero no while transforma a string em 0. Entao 0 != 0 = false. Por isso da errado

while(opcao != 0){

    console.log(`\n=====  🛫 Aeroporto / Companhia Aérea =====
1 - ✈️  Listar voos programados
2 - 🛄  Fazer check-in
3 - 🎫  Emitir cartão de embarque
4 - 🧑‍🤝‍🧑  Lista de passageiros confirmados por voo
0 - ⬅️  Voltar\n`);

        console.log('Bem-Vindo (a) !\n');

        opcao = questionInt('Qual funcao deseja realizar ? Digite o numero correspondednte : ');
        switch(opcao){
            case 1 :
                console.log('\n🔎 Lista de Voos Programados : \n');
                listarVoos();
                break;
            case 2 :
                let nomePassageiro = question('\nDigite o nome completo : ').trim();
                let documentoPassageiro = question('Digite o N do documento : ').trim();
                let passagemAtualizada = realizarCheckin(nomePassageiro,documentoPassageiro);//recebe tres objetos
                


                if(passagemAtualizada && passagemAtualizada.passagem.status === 'checked-in'){
                    console.log(`\n✅ Checkin realizado com sucesso ! 
🎫 Agora, va para a funcao de emitir cartao de embarque para finalizar.`);
                }
                
                break;
                
            case 3 :
            
            let nome = question('\nDigite o nome completo : ').trim();
            let numeroDocumento = question('Digite o N do documento : ').trim();

            let dadosCheckin = realizarCheckin(nome,numeroDocumento);
            

            let cartao = emitirCartao(dadosCheckin);
            

            if(cartao){
                console.log(`
    ==== CARTÃO DE EMBARQUE ====
    
    Nome: ${cartao.nome}
    Documento: ${cartao.documento}
    Voo: ${cartao.voo}
    Assento: ${cartao.assento}
    Origem: ${cartao.origem}
    Destino: ${cartao.destino}
    Partida: ${cartao.horarioPartida}
    Chegada: ${cartao.horarioChegada}
    ============================
    `);
            }

                break;
            case 4 :
                console.log('\n🔎 Lista de Voos Programados : \n');
                listarVoos()

                let vooID =  question('\nDigite o ID do voo escolhido : ').trim();
                // mandar valor para a funcao
                listarPassageiros(vooID);

                let {voo, passageiros} = listarPassageiros(vooID);

                if(!voo || passageiros === 0){
                    console.log('\n❌ Nenhum passageiro encontrado !');
                    break;
                }

                console.log(`\n🔎 Passageiros confirmados do voo ${vooID}`);
                passageiros.forEach((pass,index) =>{
                    console.log(`Passageiro ${index+1} | Nome : ${pass.nome} - Documeento : ${pass.documento} `);
                });
                
                break;
                
            case 0 : break;
            
            default : 
                console.log('\n❌ Opcao invalida ! Digite novamente');      
            }
    }
}