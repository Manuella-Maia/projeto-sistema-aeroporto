import {question, questionInt } from "readline-sync";
// import {exibirPacotes, encontarPacote, gerarPassagem, encontarVoo, gerarPassagemAvulsa} from "../sistema-aeroporto/modules/pacotes.js"
import {exibirPacotes, encontarPacote, gerarPassagem, encontarVoo, gerarPassagemAvulsa} from "./modules/pacotes.js"
import { voos } from "./data/voos.js";

export function menuAgencia(){

let opcao = -1;
// let opcao = ''; o Js na hora de comparar string com numero no while transforma a string em 0. Entao 0 != 0 = false. Por isso da errado

while(opcao != 0){

    console.log(`\n===== 🏢 Agência de Viagens =====
1 - 📦   Listar pacotes
2 - 💳   Comprar pacote
3 - 🎟️   Comprar passagem avulsa
0 - ⬅️   Voltar\n`);

        console.log('Bem-Vindo (a) !\n');

        opcao = questionInt('Qual funcao deseja realizar ? Digite o numero correspondente : ');
        switch(opcao){
            case 1 :
                exibirPacotes();
                break;
            case 2 :
                // logica de comprar pacotes
                let nomePacote = question('\nQual pacote deseja comprar ? Digite o destino do pacote que deseja : ').trim();
                let localOrigem = question('Qual o ponto de origem ? Ex : Belo Horizonte (CNF). Digite : ').trim();
                let nomeCliente = question('Digite seu nome completo : ').trim();
                let documentoCliente = question('N do documento : ').trim();

                let dadosPacote = encontarPacote(nomePacote,nomeCliente,documentoCliente,localOrigem);

                if(!dadosPacote || dadosPacote.voos.length === 0){
                    console.log('\n❌ Nenhum voo disponivel para esse destino/origem 📍 !\n')
                    break;
                }

                console.log('\n🔎 Voos Disponiveis : ');
                dadosPacote.voos.forEach(voo => {
                        console.log(`ID: ${voo.id} | Partida: ${voo.dataHoraPartida} | Chegada: ${voo.dataHoraChegada}`);
                });

                let idVooSelecionado = question('\nDigite o ID do voo que deseja escolher : ').trim();
                let vooSelecionado = dadosPacote.voos.find(voo => idVooSelecionado.toLowerCase() === voo.id.toLowerCase());
                
                let assentosDisponiveis = vooSelecionado.assentos.filter(assento => 
                    !vooSelecionado.assentosOcupados.includes(assento.toLowerCase())
                );
                
                // mostrar acentos 
                // mostrar acentos disponiveis (comparando os ocupados com o array de assentos)
                console.log('\nAssentos Disponiveis : ');
                console.log(assentosDisponiveis.join(' '));

                let assentoSelecionado = question('\nDigite o numero assento desejado (ex: 1A) : ').trim();

                let assentoCorrespondente = vooSelecionado.assentos.find(assento => assentoSelecionado.toLowerCase() === assento.toLowerCase());

                if(!assentoCorrespondente){
                    console.log('\n❌ Assento nao encontrado ! \n');
                    break;
                }
                // console.log('\nAssentos do Voo : ');
                // let espaco = '';
                // vooSelecionado.assentos.forEach((assento) => {
                //     espaco += assento + ' ';
                // })
                // console.log(espaco);

                // let assentoSelecionado = question('\nDigite o numero assento desejado (ex: 1A) : ').trim();

                // let assentoCorrespondente = vooSelecionado.assentos.find(assento => assentoSelecionado.toLowerCase() === assento.toLowerCase());

                // if(!assentoCorrespondente){
                //     console.log('\n❌ Assento nao encontrado ! \n');
                //     break;
                // }
                // logica de pagamento/confirmação da compra do pacote
                gerarPassagem(dadosPacote,idVooSelecionado,assentoSelecionado)

                break;
            case 3 :
            
                let origem = question('\nQual o ponto de origem ? Ex : Belo Horizonte (CNF). Digite : ').trim();
                let destino = question('Qual o destino ? Digite : ').trim();
                let nome = question('Digite seu nome completo : ').trim();
                let documento = question('N do documento : ').trim();  //.trim(); tira os espacos antes e depois

                let dadosPassagemAvulsa = encontarVoo(origem,destino,nome,documento);

                if(!dadosPassagemAvulsa || dadosPassagemAvulsa.voos.length === 0){
                    console.log('\n❌ Nenhum voo disponivel para esse destino/origem 📍 !\n')
                    break;
                }

                console.log('\n🔎 Voos Disponiveis : ');
                dadosPassagemAvulsa.voos.forEach(voo => {
                    console.log(`ID: ${voo.id} | Partida: ${voo.dataHoraPartida} | Chegada: ${voo.dataHoraChegada}`);
                });

                let idvooSelecionado = question('\nDigite o ID do voo que deseja escolher :').trim();
                //mostrar assentos disponiveis antes
                let vooEscolhido = dadosPassagemAvulsa.voos.find(voo => idvooSelecionado.toLowerCase() === voo.id.toLowerCase());
                // mostrar acentos 
                console.log('\nAssentos do Voo : ');
                let espacoLinha = '';
                vooEscolhido.assentos.forEach((assento) => {
                    espacoLinha += assento + ' ';
                })
                console.log(espacoLinha);

                let assentoEscolhido = question('\nDigite o numero assento desejado (ex: 2A) : ').trim();
                //logica de pagamento atens de dar a passagem 

                gerarPassagemAvulsa(dadosPassagemAvulsa,idvooSelecionado,assentoEscolhido)
                
                break;
                
            case 0 : break;
            
            default : 
                console.log('❌ Opcao invalida ! Digite novamente');      
            }
    }
}              
            