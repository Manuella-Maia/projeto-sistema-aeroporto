# ✈️ Sistema de Gerenciamento de Aeroporto

Este é um projeto em **Node.js** que simula o funcionamento de um sistema de aeroporto, incluindo operações como:

- Compra de passagens e pacotes
- Associação de passageiros a voos
- Seleção de assentos
- Realização de check-in
- Emissão de cartão de embarque
- Simulação de pacotes de viagem

O sistema funciona atualmente no **terminal**, utilizando inputs do usuário para navegar pelas opções.

---

## 🚀 Funcionalidades

- **Cadastro de passageiros** – identificação por nome e documento.  
- **Busca de voos** – pesquisa por origem e destino.  
- **Compra de pacotes ou passagens avulsas** – geração de passagem vinculada ao passageiro.  
- **Assentos** – controle básico de assentos ocupados.  
- **Check-in** – validação da passagem e autorização de embarque.  
- **Cartão de embarque** – emissão com dados essenciais (nome, voo, assento, horários etc.).  

---

## 🛠️ Tecnologias utilizadas

- **Node.js (ESM)** → base do projeto.  
- **Módulos JS** → organização em arquivos separados (`passagens.js`, `voos.js`, `checkin.js`, etc.).  
- **Inquirer.js / readline** → interação com o usuário pelo terminal.   

---

## 📚 Aprendizados até agora

Durante o desenvolvimento deste projeto, foram explorados:

- Estruturação de módulos em Node.js.  
- Manipulação de arrays e objetos simulando banco de dados.  
- Lógica de **relacionamento entre entidades** (passageiro, voo, passagem, pacote).  
- Implementação de **validações** (passageiro não encontrado, assento ocupado, voo inexistente).  
- Simulação de **fluxos reais de aeroportos** em ambiente de console.  

---

## 🏗️ Status do Projeto

⚠️ **Em fase de desenvolvimento!**  
O sistema já permite simular vários fluxos reais de um aeroporto, mas **ainda há melhorias previstas**, como:

- Interface gráfica simples (fora do terminal).  
- Simular sistema de pagamento mais completo.  
- Melhor visualização de assentos disponíveis.  
- Persistência em banco de dados ou arquivos JSON.  

---

