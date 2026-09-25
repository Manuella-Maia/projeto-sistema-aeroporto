
## Abastração de dados

### Atores do sistema

- Passageiros
- Agencia de viagens
- Aeroporto

### Objetos do sistema:

- Pacotes
- Voos
- Check-in
- Cartão de embarque
- Assentos
- Passagem
- Aeronave


### Atributos de cada ator e objeto (Perspectiva para POO)

#### Atores

- Passageiros: id, nome, cpf, telefone, email
- Agencia de viagens: id, nome_empresa, cnpj, email, telefone
- Aeroporto: id, nome_aeroporto, endereço

#### Objetos 

- Pacotes: id, destino, duracao, dataInicio, dataFim, preco, inclui(itens inclusos)

- Voos: id, origem, destino, dataHoraPartida, dataHoraChegada, aeronave, capacidade, assentos[]

- Aeronave: id, modelo, capacidade, fabricante

- Assento: id, numero, status

- Passagem: id, voo, passageiro, assento, status_passagem
  
- Check-in: id, dataHora, status, passageiro, voo, assento, bagagem

- Cartão de embarque: id, passageiro, voo, assento, origem, destino, horarioPartida, horarioChegada.


### Atributos de cada ator e objeto (Perspectiva para BD)

#### Atores

- Passageiros: id, nome, cpf, telefone, email
- Agencia de viagens: id, nome_empresa, cnpj, email, telefone
- Aeroporto: id, nome_aeroporto, endereço

#### Objetos 

- Pacotes: id, destino, duracao, dataInicio, dataFim, preco, inclui(itens inclusos)

- Voos: id, origem, destino, dataHoraPartida, dataHoraChegada, id_aeronave, capacidade, assentos[]

- Aeronave: id, modelo, capacidade, fabricante

- Assento: id, numero, status

- Passagem: id, id_voo, id_passageiro, assento_selecionado, status_passagem
  
- Check-in: id, dataHora, status, id_passageiro, id_voo, id_assento, bagagem

- Cartão de embarque: id, id_passageiro, id_voo, id_assento, origem, destino, horarioPartida, horarioChegada.


