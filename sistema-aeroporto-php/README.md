# ✈️ Sistema Aeroporto — PHP

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/CLI-Command%20Line-000000?style=for-the-badge&logo=gnubash&logoColor=white" alt="CLI">
  <img src="https://img.shields.io/badge/OOP-Programming-6A5ACD?style=for-the-badge" alt="OOP">
  <img src="https://img.shields.io/badge/PHPDoc-Documentation-8892BF?style=for-the-badge&logo=php&logoColor=white" alt="PHPDoc">
  <img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white" alt="Git">
  <img src="https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub">
</p>

<p align="center">
  <strong>Sistema de simulação de uma agência de viagens desenvolvido em PHP com Programação Orientada a Objetos e interface CLI.</strong>
</p>

---

## 📖 Sobre o projeto

O **Sistema Aeroporto PHP** é uma aplicação desenvolvida para simular parte do fluxo de uma **agência de viagens**.

A agência utiliza a **InterAirlines** como plataforma intermediadora para consultar voos disponibilizados por diferentes companhias aéreas.

O projeto foi desenvolvido com foco em:

- 🧩 Programação Orientada a Objetos;
- 🏗️ Separação de responsabilidades;
- 📦 Organização em camadas;
- 💻 Aplicação CLI;
- 🔗 Relacionamento entre objetos;
- 📝 Documentação com PHPDoc;
- 🌱 Boas práticas de Git e GitHub.

> 💡 Este projeto possui finalidade educacional e utiliza dados simulados. Não representa uma integração real com companhias aéreas ou aeroportos.

---

## 🛠️ Tecnologias

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/CLI-Command%20Line-000000?style=for-the-badge&logo=gnubash&logoColor=white" alt="CLI">
  <img src="https://img.shields.io/badge/OOP-6A5ACD?style=for-the-badge" alt="Object Oriented Programming">
  <img src="https://img.shields.io/badge/PHPDoc-Documentation-8892BF?style=for-the-badge&logo=php&logoColor=white" alt="PHPDoc">
  <img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white" alt="Git">
  <img src="https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub">
</p>

### Principais conceitos

- `Classes`
- `Objetos`
- `Encapsulamento`
- `Associação`
- `Composição`
- `Tipagem`
- `Arrays associativos`
- `Services`
- `PHPDoc`
- `CLI`
- `ANSI Escape Codes`

---

## ✈️ Funcionamento

O sistema representa o seguinte fluxo:

```text
┌──────────────────────┐
│   Agência de Viagens │
└──────────┬───────────┘
           │
           │ pesquisa / compra
           ▼
┌──────────────────────┐
│     InterAirlines    │
│    Intermediadora    │
└──────────┬───────────┘
           │
     ┌─────┴─────┐
     ▼           ▼
┌──────────┐ ┌──────────┐
│Companhia │ │Companhia │
│ Aérea    │ │ Aérea    │
└────┬─────┘ └────┬─────┘
     │             │
     ▼             ▼
   Voos           Voos
```

A **InterAirlines não representa uma companhia aérea**.

Ela funciona como uma plataforma intermediadora que centraliza os voos oferecidos pelas companhias cadastradas.

---

## 🎯 Funcionalidades

### 🔎 Pesquisa de voos

Permite pesquisar voos utilizando:

- origem;
- destino.

Os resultados apresentam:

- 🆔 ID do voo;
- ✈️ companhia aérea;
- 📍 origem;
- 📍 destino;
- 🕐 horário de partida;
- 🕐 horário de chegada;
- 🛫 aeronave;
- 💰 valor;
- 💺 quantidade de assentos disponíveis.

### 🎫 Compra de passagem

O usuário pode:

1. informar origem;
2. informar destino;
3. selecionar um voo;
4. visualizar os assentos disponíveis;
5. escolher um assento;
6. realizar a compra.

Fluxo:

```text
Origem
   ↓
Destino
   ↓
Pesquisa de voos
   ↓
Escolha do voo
   ↓
Assentos disponíveis
   ↓
Escolha do assento
   ↓
Validação
   ↓
PassagemService
   ↓
Passagem criada
```

### 🧳 Consulta de pacotes

O sistema também permite consultar pacotes de viagem previamente cadastrados.

Cada pacote possui informações como:

- destino;
- duração;
- período;
- preço;
- itens incluídos.

---

# 📂 Estrutura do projeto

```text
sistema-aeroporto-php/
│
├── 📁 class/
│   ├── AgenciaViagens.php
│   ├── Assento.php
│   ├── CompanhiaAerea.php
│   ├── InterAirlines.php
│   ├── Pacote.php
│   ├── Passagem.php
│   └── Voo.php
│
├── 📁 cli/
│   ├── index.php
│   ├── pesquisarVoos.php
│   ├── comprarPassagem.php
│   ├── consultarPacotes.php
│   └── cores.php
│
├── 📁 data/
│   ├── companhias.php
│   ├── voos.php
│   ├── pacotes.php
│   └── carregarDados.php
│
├── 📁 services/
│   ├── PassagemService.php
│   └── PacoteService.php
│
└── README.md
```

---

# 🧩 Organização das pastas

## 📁 `class/`

Contém as **entidades do domínio**.

```text
class/
├── AgenciaViagens.php
├── Assento.php
├── CompanhiaAerea.php
├── InterAirlines.php
├── Pacote.php
├── Passagem.php
└── Voo.php
```

### 👩‍💼 `AgenciaViagens`

Representa a agência que utiliza a InterAirlines.

Responsável por solicitar pesquisas de voos.

### 💺 `Assento`

Representa um assento pertencente a um voo.

Controla:

- código;
- disponibilidade;
- ocupação.

### ✈️ `CompanhiaAerea`

Representa uma companhia aérea que disponibiliza voos através da InterAirlines.

Mantém seus respectivos voos.

### 🌐 `InterAirlines`

Representa a plataforma intermediadora.

Responsável por:

- centralizar companhias;
- pesquisar voos;
- consultar voos.

### 🧳 `Pacote`

Representa um pacote de viagem.

Pode possuir:

- identificação;
- nome;
- passagens;
- status.

### 🎫 `Passagem`

Representa uma passagem adquirida.

Mantém associação com:

- voo;
- assento.

Também controla seu status.

### 🛫 `Voo`

Representa um voo disponibilizado por uma companhia aérea.

Possui:

- ID;
- origem;
- destino;
- horários;
- aeronave;
- capacidade;
- valor;
- companhia;
- assentos.

---

# 📁 `data/`

Contém os dados utilizados para inicializar o sistema.

```text
data/
├── companhias.php
├── voos.php
├── pacotes.php
└── carregarDados.php
```

Os dados são armazenados em **arrays associativos PHP**.

### 🏢 `companhias.php`

Armazena os dados das companhias.

Exemplo:

```php
[
    "id" => 1,
    "nome" => "Azul Linhas Aéreas",
    "codigo" => "AZ"
]
```

### ✈️ `voos.php`

Armazena os voos disponíveis.

Cada voo possui dados como:

```text
id
origem
destino
dataHoraPartida
dataHoraChegada
aeronave
companhiaCodigo
valor
capacidade
assentosOcupados
assentos
```

### 🧳 `pacotes.php`

Armazena os pacotes de viagem disponíveis.

### 🔄 `carregarDados.php`

Responsável por transformar os dados dos arrays em objetos.

```text
companhias.php
      │
      ▼
CompanhiaAerea
      │
      ▼
voos.php
      │
      ▼
Voo
      │
      ▼
Assento
      │
      ▼
InterAirlines
```

---

# 📁 `services/`

Contém os serviços responsáveis por operações do sistema.

```text
services/
├── PassagemService.php
└── PacoteService.php
```

## 🎫 `PassagemService`

Responsável pelo processo de compra.

```text
Voo
 ↓
Assento
 ↓
Validação
 ↓
Ocupação
 ↓
Passagem
```

A validação verifica se o assento já está ocupado antes de criar a passagem.

## 🧳 `PacoteService`

Responsável por operações relacionadas aos pacotes.

Atualmente permite adicionar uma passagem a um pacote.

---

# 📁 `cli/`

Contém a interface de interação com o usuário.

```text
cli/
├── index.php
├── pesquisarVoos.php
├── comprarPassagem.php
├── consultarPacotes.php
└── cores.php
```

### 🖥️ `index.php`

É o ponto de entrada da aplicação.

Responsável por:

- carregar dependências;
- inicializar dados;
- criar a agência;
- inicializar a InterAirlines;
- apresentar o menu;
- direcionar as operações.

### 🔎 `pesquisarVoos.php`

Responsável pela interface de pesquisa.

### 🎫 `comprarPassagem.php`

Responsável pela interface de compra.

### 🧳 `consultarPacotes.php`

Responsável pela interface de consulta dos pacotes.

---

# 🎨 Sistema de cores

O arquivo:

```text
cli/cores.php
```

centraliza as cores utilizadas na interface.

Exemplo:

```php
const RESET = "\033[0m";

const VERDE = "\033[32m";
const VERMELHO = "\033[31m";
const AMARELO = "\033[33m";
const AZUL = "\033[34m";
const CIANO = "\033[36m";
const NEGRITO = "\033[1m";
```

Também existe uma configuração específica para as companhias:

```php
const CORES_COMPANHIAS = [
    "AZ" => CIANO,
    "LA" => VERMELHO,
    "TP" => VERDE,
    "GOL" => AMARELO,
];
```

### 🏢 Cores das companhias

| Código | Companhia | Cor |
|---|---|---|
| `AZ` | Azul Linhas Aéreas | Ciano |
| `LA` | LATAM Airlines | Vermelho |
| `TP` | TAP Air Portugal | Verde |
| `GOL` | GOL Linhas Aéreas | Amarelo |

> 🎨 As cores possuem finalidade exclusivamente visual e não fazem parte das regras de negócio.

---

# 🏗️ Arquitetura

O projeto utiliza uma separação simples de responsabilidades:

```text
                 ┌─────────────┐
                 │     CLI     │
                 │    cli/     │
                 └──────┬──────┘
                        │
                        ▼
                 ┌─────────────┐
                 │  SERVICES   │
                 │  services/  │
                 └──────┬──────┘
                        │
                        ▼
                 ┌─────────────┐
                 │   DOMAIN    │
                 │    class/   │
                 └──────┬──────┘
                        │
                        ▼
                 ┌─────────────┐
                 │    DATA     │
                 │    data/    │
                 └─────────────┘
```

| Pasta | Responsabilidade |
|---|---|
| `class/` | Entidades e domínio |
| `services/` | Operações e casos de uso |
| `data/` | Dados iniciais |
| `cli/` | Interface com o usuário |

---

# 📐 Regras de arquitetura

## 1️⃣ CLI

A CLI deve ser responsável principalmente por:

- entrada de dados;
- saída de dados;
- menus;
- apresentação;
- mensagens;
- interação com o usuário.

Evitar colocar regras de negócio complexas na CLI.

## 2️⃣ Classes

As entidades devem:

- representar conceitos do domínio;
- manter seus atributos encapsulados;
- controlar seu próprio estado;
- possuir métodos relacionados à sua responsabilidade.

## 3️⃣ Services

Os serviços devem coordenar operações que envolvam uma ou mais entidades.

Exemplo:

```text
PassagemService
      │
      ├── verifica assento
      ├── ocupa assento
      └── cria passagem
```

## 4️⃣ Data

Os arquivos de `data/` devem representar os dados iniciais utilizados pela aplicação.

Não devem conter regras complexas de negócio.

---

# 🔐 Encapsulamento

As propriedades das classes devem permanecer privadas.

### ❌ Evitar

```php
$assento->ocupado = true;
```

### ✅ Preferir

```php
$assento->ocupar();
```

Isso mantém o controle do estado dentro da própria classe.

---

# 🧠 Tipagem

O projeto utiliza tipagem nas propriedades, parâmetros e retornos sempre que possível.

Exemplo:

```php
private int $id;

private string $nome;

public function getId(): int
{
    return $this->id;
}
```

---

# 📝 PHPDoc

As classes e arquivos principais possuem documentação utilizando **PHPDoc**.

Exemplo:

```php
/**
 * Representa um voo disponibilizado por uma companhia aérea.
 *
 * @package SistemaAeroporto
 * @author Manuella Maia Lopes
 * @version 1.0.0
 * @since 1.0.0
 */
```

Métodos podem utilizar:

```php
/**
 * Pesquisa voos por origem e destino.
 *
 * @param string $origem
 * @param string $destino
 * @return array
 */
```

A documentação facilita:

- manutenção;
- leitura;
- entendimento do projeto;
- geração futura de documentação;
- colaboração.

---

# ▶️ Como executar

## 📋 Pré-requisitos

- PHP;
- PHP CLI;
- terminal compatível.

O projeto pode ser executado utilizando o terminal disponibilizado pelo **Laragon**.

## 🚀 Execução

Entre na pasta do projeto:

```bash
cd sistema-aeroporto-php
```

Execute:

```bash
php cli/index.php
```

O menu será apresentado:

```text
========================================
       AGÊNCIA HORIZONTE VIAGENS
========================================
1 - Pesquisar voos
2 - Comprar passagem
3 - Consultar pacotes
0 - Sair
========================================
```

---

# 🧪 Dados simulados

O projeto utiliza dados simulados armazenados em arquivos PHP.

### 🏢 Companhias

```text
AZ  → Azul Linhas Aéreas
LA  → LATAM Airlines
TP  → TAP Air Portugal
GOL → GOL Linhas Aéreas
```

### ✈️ Voos

Os voos possuem:

- origem;
- destino;
- horários;
- aeronave;
- companhia;
- valor;
- capacidade;
- assentos.

### 💺 Assentos

Os assentos são transformados em objetos `Assento` durante o carregamento dos dados.

---

# ⚠️ Limitações atuais

O projeto atualmente não utiliza banco de dados.

Também não possui:

- 🗄️ banco de dados;
- 🌐 API REST;
- 🔐 autenticação;
- 💳 pagamento;
- 🔌 APIs externas;
- 🛫 integração real com companhias aéreas;
- 🏢 integração com aeroportos;
- 💾 persistência das compras;
- 🛂 sistema real de check-in;
- 🎫 cartão de embarque;
- 📡 dados de voos em tempo real.

Essas funcionalidades podem fazer parte de versões futuras.

---

# 🚀 Roadmap

## ✅ Versão atual — v1.0

- [x] Estrutura inicial PHP
- [x] Classes de domínio
- [x] Programação Orientada a Objetos
- [x] Dados simulados
- [x] Carregamento dos dados
- [x] Pesquisa de voos
- [x] Consulta de pacotes
- [x] Compra de passagem
- [x] Controle de assentos
- [x] Interface CLI
- [x] Cores no terminal
- [x] PHPDoc

## 🔜 Possíveis versões futuras

- [ ] Testes automatizados
- [ ] Persistência de dados
- [ ] Banco de dados MySQL
- [ ] CRUD
- [ ] Histórico de compras
- [ ] API REST
- [ ] Autenticação
- [ ] Integrações externas

---

# 🌱 Como contribuir

Contribuições são bem-vindas.

## 1. 🍴 Fork

Faça um fork do projeto para sua conta do GitHub.

## 2. 🌿 Crie uma branch

Utilize uma branch específica para sua alteração:

```bash
git checkout -b feat/nova-funcionalidade
```

Exemplos:

```text
feat/consultar-passagens
fix/validacao-assento
docs/melhorar-readme
refactor/organizar-services
```

## 3. 💻 Faça suas alterações

Mantenha a separação existente:

```text
class/
services/
data/
cli/
```

Evite adicionar lógica de negócio diretamente na interface CLI.

## 4. 🧪 Teste

Execute:

```bash
php cli/index.php
```

Verifique as funcionalidades afetadas pela alteração.

## 5. 📝 Commit

Utilize mensagens seguindo **Conventional Commits**.

Exemplos:

```bash
git commit -m "feat: adicionar consulta de passagens"
```

```bash
git commit -m "fix: corrigir validacao de assento"
```

```bash
git commit -m "docs: atualizar README"
```

```bash
git commit -m "refactor: reorganizar servico de passagens"
```

## 6. 📤 Push

```bash
git push origin feat/nova-funcionalidade
```

Depois, abra um Pull Request.

---

# 📝 Conventional Commits

| Prefixo | Utilização |
|---|---|
| `feat` | Nova funcionalidade |
| `fix` | Correção de erro |
| `refactor` | Refatoração |
| `docs` | Documentação |
| `test` | Testes |
| `style` | Formatação/estilo |
| `chore` | Manutenção |

### Exemplos

```text
feat: adicionar pesquisa de voos
fix: corrigir consulta de assento
refactor: separar logica de compra
docs: atualizar README
test: adicionar testes para PassagemService
```

---

# 📌 Regras para contribuição

Ao contribuir:

- 🧩 mantenha a separação de responsabilidades;
- 🔒 preserve o encapsulamento;
- 📝 documente novas classes;
- 💡 utilize tipagem quando aplicável;
- 🚫 evite dependências desnecessárias;
- 🏗️ respeite a arquitetura.

---

# 👩‍💻 Autora

**Manuella Maia Lopes**

🎓 Técnica em Desenvolvimento de Sistemas  
💻 Desenvolvimento Back-End  
🐘 PHP | JavaScript | TypeScript | Node.js

---

# 📄 Licença

Este projeto foi desenvolvido para fins educacionais e de portfólio.