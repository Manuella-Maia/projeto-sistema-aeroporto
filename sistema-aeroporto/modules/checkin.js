//  # lógica de check-in

import { passagens } from "../data/pasagens.js";
import { passageiros } from "../data/passageiros.js";
import { voos } from "../data/voos.js";

export function realizarCheckin(nomePassageiro,documentoPassageiro){
    let passageiroEncontrado = passageiros.find(pass => 
        pass.documento.toLowerCase() === documentoPassageiro.toLowerCase() && pass.nome.toLowerCase() === nomePassageiro.toLowerCase()
    );

    if(!passageiroEncontrado){
        console.log('\n⚠️  Passageiro nao encontrado !  Confira o nome e o N do documento .')
        return;
    }
    
    let passagemIdentificada = passagens.find(p => p.passageiroId === passageiroEncontrado.id)


    if(!passagemIdentificada){
        console.log('\n❌ Passagem nao encontrada para este passageiro!')
        return;
    }

    let vooValido = voos.find(voo => voo.id.toLowerCase() === passagemIdentificada.vooId.toLowerCase());
    

    if(!vooValido){
        console.log('\n❌ Passagem negada! ID da passagem não corresponde a nenhum voo')
        return;
    }
    

    passagemIdentificada.status = 'checked-in'

    return {
        passagem : passagemIdentificada,
        voo : vooValido,
        passageiro : passageiroEncontrado
    }

}

export function emitirCartao(dadosCheckin){

    if(!dadosCheckin){
        console.log("\n❌ Dados do check-in não encontrados. Não é possível emitir o cartão.")
        return;
    }

    if(dadosCheckin.passagem.status !== 'checked-in'){
        console.log('\n❌ Check-in nao realizado. Nao e possivel emitir o cartao.')
        return;
        }

        let cartao = {
            nome : dadosCheckin.passageiro.nome,
            documento : dadosCheckin.passageiro.documento,
            voo : dadosCheckin.voo.id,
            assento : dadosCheckin.passagem.assento ,
            origem : dadosCheckin.voo.origem,
            destino : dadosCheckin.voo.destino,
            horarioPartida : dadosCheckin.voo.dataHoraPartida,
            horarioChegada : dadosCheckin.voo.dataHoraChegada
        }

        return cartao
        
    }

     
