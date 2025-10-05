// # lógica de pacotes de viagem
import { pacotes } from "../data/pacotes.js";
import { passagens } from "../data/pasagens.js";
import { passageiros } from "../data/passageiros.js";
import { voos } from "../data/voos.js";

// const norm = (s) => {
//     return s
//       .normalize("NFD")                 // separa letras e acentos
//       .replace(/[\u0300-\u036f]/g, "")  // remove acentos
//       .toLowerCase()
//       .trim();
// };


export function exibirPacotes(){
  
    pacotes.forEach((pacote,index) => {
        // console.log(`Pacote ${index+1} - Destino : ${pacote.destino} - Duracao : ${pacote.duracao} | Inclusos : ${pacote.inclui}`)
        console.log(`\nPacote ${index+1} 
Destino : ${pacote.destino}
Duracao : ${pacote.duracao}
Valor : ${pacote.preco} | Inclusos : ${pacote.inclui}`);

console.log('--------------------------------------')
    });

}
// mudar nomePacote para destinoPacote
export function encontarPacote(nomePacote,nomeCliente,documentoCliente,localOrigem){
    // problema com acentuação na horar de comparar os valores
     let pacoteEncontrado = pacotes.find(pacote => pacote.destino.toLowerCase().includes(nomePacote.toLowerCase()));

     let clienteEncontrado = passageiros.find(cliente => cliente.nome.toLowerCase() === nomeCliente.toLowerCase() && cliente.documento === documentoCliente);

     if (!pacoteEncontrado) {
        console.log("\n❌ Pacote não encontrado! Verifique o destino digitado.");
        return;
        }

     if(!clienteEncontrado){

        let novoId = passageiros.length + 1 ;// so funciona se nao remover nenum passageiro
        clienteEncontrado =  {id : novoId, nome : nomeCliente, documento : documentoCliente};
        passageiros.push(clienteEncontrado)
     }
    
     let voosDisponiveis = voos.filter(voo => 
    voo.destino.toLowerCase() === pacoteEncontrado.destino.toLowerCase() &&
    voo.origem.toLowerCase() === localOrigem.toLowerCase()
);

     return { pacote: pacoteEncontrado, cliente: clienteEncontrado, voos: voosDisponiveis };
}

export function gerarPassagem(dadosPacote,idVooSelecionado,assentoSelecionado){
    let {cliente, pacote, voos} = dadosPacote;
    let vooSelecionado = voos.find(voo => voo.id.toLowerCase() === idVooSelecionado.toLowerCase());

    if(!vooSelecionado){
        console.log('❌ Voo nao encontrado !');
        return;
    }

    if(!vooSelecionado.assentos.includes(assentoSelecionado)){
        console.log('❌ Assento invalido !');
        return;
    }

    if(vooSelecionado.assentosOcupados.includes(assentoSelecionado)){
        console.log('❌ Assento ja ocupado ! Escolha outro.');
        return;
    }

    vooSelecionado.assentosOcupados.push(assentoSelecionado);
    let novoId = passagens.length + 1;

    let passagem = {
        id: novoId,
        vooId: vooSelecionado.id,
        passageiroId: cliente.id,
        assento: assentoSelecionado,
        status: "confirmada"
    };

    passagens.push(passagem);

    let exibirPassagem = {
    passageiro: cliente.nome,
    documento: cliente.documento,
    destino: pacote.destino,
    voo: vooSelecionado.id,
    assento: assentoSelecionado,
    partida: vooSelecionado.dataHoraPartida,
    chegada: vooSelecionado.dataHoraChegada
  };

  console.log('\n🎫 Passagem gerada com sucesso : ');
  console.log(exibirPassagem);

  return passagem;

}

export function encontarVoo(origem,destino,nomeCliente,documentoCliente){
    let clienteEncontrado = passageiros.find(cliente => cliente.nome.toLowerCase() === nomeCliente.toLowerCase() && cliente.documento === documentoCliente);

    if(!clienteEncontrado){

        let novoId = passageiros.length + 1 ;// so funciona se nao remover nenum passageiro
        clienteEncontrado =  {id : novoId, nome : nomeCliente, documento : documentoCliente};
        passageiros.push(clienteEncontrado);
     }

     let voosDisponiveis = voos.filter(voo => voo.origem.toLowerCase() === origem.toLowerCase() && voo.destino.toLowerCase() === destino.toLowerCase());

     return {voos : voosDisponiveis, cliente : clienteEncontrado, destino : destino, origem : origem};
}

export function gerarPassagemAvulsa(dadosPassagemAvulsa,idvooSelecionado,assentoEscolhido){
    let {cliente,voos,destino,origem} = dadosPassagemAvulsa;
    let vooSelecionado = voos.find(voo => voo.id.toLowerCase() === idvooSelecionado.toLowerCase());

    if(!vooSelecionado){
        console.log('\n❌ Voo nao encontrado !')
        return;
    }

    if(vooSelecionado.assentosOcupados.includes(assentoEscolhido)){
        console.log('\n❌ Assento ocupado ! Escolha outro.')
        return;
    }

    vooSelecionado.assentosOcupados.push(assentoEscolhido);

    let novoId = passagens.length + 1;

    let passagem = {
        id: novoId,
        vooId: vooSelecionado.id,
        passageiroId: cliente.id,
        assento: assentoEscolhido,
        status: "confirmada"
    };

    passagens.push(passagem);

    let exibirPassagem = {
    passageiro: cliente.nome,
    documento: cliente.documento,
    origem :  origem,
    destino: destino,
    voo: vooSelecionado.id,
    assento: assentoEscolhido,
    partida: vooSelecionado.dataHoraPartida,
    chegada: vooSelecionado.dataHoraChegada
  };

  console.log('✅ Passagem gerada com sucesso : ');
  console.log(exibirPassagem);

  return passagem;

}