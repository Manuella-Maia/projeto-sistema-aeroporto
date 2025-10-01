//  # lógica de voos e passagens

import {voos} from "../data/voos.js"
import { passageiros } from "../data/passageiros.js";
import { passagens } from "../data/pasagens.js";

export function listarVoos(){
    voos.forEach(voo => {
        console.log(`Aeronave : ${voo.aeronave} | ID : ${voo.id}
Origem : ${voo.origem}
Destino : ${voo.destino}
Hora de Partida : ${voo.dataHoraPartida}
Hora de Chegada : ${voo.dataHoraChegada}
`);
console.log('--------------------------------------')
    })
}

export function listarPassageiros(vooID){
    let vooLista = voos.find(voo => voo.id.toLowerCase() === vooID.toLowerCase());

    if(!vooLista){
        console.log('⚠️ Voo nao encontrado ! Tente novamente.')
        return;
    }
    
    let passagensVoo = passagens.filter(p => p.vooId.toLowerCase() === vooID.toLowerCase())
    let passageirosVoo = passagensVoo.map(pass => {
        return passageiros.find(p => p.id === pass.passageiroId)
    }) // pass seria um elemento do array de passageiros

    return {voo : vooLista, passageiros : passageirosVoo}
}