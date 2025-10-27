# Barbearia do Leone

Projeto desenvolvido para a disciplina de **Desenvolvimento em Dispositivos Móveis** da Universidade Estácio de Sá (campus Teresópolis), no curso de **Análise e Desenvolvimento de Sistemas**. O objetivo é apresentar um site responsivo para uma barbearia real, a "Barbearia do Leone", localizada em Guapimirim-RJ, com formulário de agendamento integrado a um backend em PHP e banco de dados MySQL.

## Sumário

- [Visão Geral](#visão-geral)
- [Objetivos do Projeto](#objetivos-do-projeto)
- [Tecnologias Principais](#tecnologias-principais)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Backend PHP e Banco de Dados](#backend-php-e-banco-de-dados)
- [Preparando o Ambiente com XAMPP](#preparando-o-ambiente-com-xampp)
- [Como Executar Localmente](#como-executar-localmente)
- [Funcionalidades Implementadas](#funcionalidades-implementadas)
- [Melhorias Futuras](#melhorias-futuras)
- [Créditos](#créditos)

## Visão Geral

O projeto consiste em um site institucional que divulga serviços, portfólio e depoimentos da barbearia, além de permitir que clientes agendem atendimento por meio de um formulário conectado a um banco de dados. A solução foi construída com foco em dispositivos móveis, seguindo boas práticas de responsividade.

## Objetivos do Projeto

- **Aplicar conceitos da disciplina**: consolidar o conteúdo trabalhado em sala sobre desenvolvimento mobile-first e integração entre front-end e back-end.
- **Demonstrar um fluxo de agendamento**: coletar nome, telefone, data e horário desejados e gravar as informações em uma tabela MySQL.
- **Exercitar o uso de XAMPP e PHP**: utilizar o pacote XAMPP para hospedar o site e executar scripts PHP localmente com suporte a banco de dados.

## Tecnologias Principais

- **HTML5 e CSS3/SCSS**: estrutura e estilos das páginas (`index.html`, `about.html`, `services.html`, etc.).
- **JavaScript**: interações e componentes front-end (`js/`).
- **PHP 8+**: processamento do formulário de contato/agendamento em `form.php`.
- **MySQL (MariaDB)**: armazenamento das mensagens e agendamentos na tabela `contatos`.
- **XAMPP**: pacote que reúne Apache, PHP e MySQL para execução local do projeto.
- **Bibliotecas visuais**: icomoon, swiper e estilos pré-compilados disponíveis na pasta `css/`.

## Estrutura do Projeto

```text
projeto_barber_estacio/
├── index.html             # Página inicial com hero, serviços e CTA
├── about.html             # Página "Sobre" com informações da barbearia
├── services.html          # Listagem detalhada de serviços
├── contacts.html          # Página de contato com formulário
├── form.html              # Formulário isolado para agendamento
├── form.php               # Backend PHP que grava agendamentos
├── includes/
│   └── db.php             # Configuração de conexão PDO com MySQL
├── css/                   # Folhas de estilo compiladas
├── scss/                  # Arquivos fonte SCSS
├── js/                    # Scripts JavaScript
├── Img/, svg/, fonts/     # Recursos estáticos
└── README.md              # Este documento
```

## Backend PHP e Banco de Dados

- **Conexão**: `includes/db.php` cria uma instância PDO apontando para o banco `barbearia_guapi` usando as credenciais padrão do XAMPP (`root` sem senha).
- **Processamento**: `form.php` recebe os campos enviados pelo formulário (`nome`, `sobrenome`, `telefone`, `mensagem`, `data_`, `horario`, `created_at`) e armazena na tabela `contatos`.
- **Validação**: o script assume que os campos obrigatórios são enviados e que o banco está configurado corretamente. Recomenda-se adicionar sanitização e validações adicionais em um ambiente de produção.

### Estrutura sugerida da tabela `contatos`

```sql
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    telefone VARCHAR(30) NOT NULL,
    mensagem TEXT,
    data_ DATE NOT NULL,
    horario TIME NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

Caso utilize outra estrutura, ajuste os campos em `form.php` e garanta que o arquivo `includes/db.php` possua as credenciais corretas.

## Preparando o Ambiente com XAMPP

1. **Instale o XAMPP** (Windows, macOS ou Linux) a partir de [apachefriends.org](https://www.apachefriends.org/).
2. **Inicie os serviços Apache e MySQL** pelo painel de controle do XAMPP.
3. **Crie o banco de dados** `barbearia_guapi` via phpMyAdmin (`http://localhost/phpmyadmin`).
4. **Execute o script SQL** da seção anterior ou crie manualmente a tabela `contatos`.
5. **Copie o diretório do projeto** para dentro de `htdocs/` (ex.: `C:\xampp\htdocs\projeto_barber_estacio`).
6. **Verifique as credenciais em `includes/db.php`** e ajuste se necessário (host, usuário ou senha).

## Como Executar Localmente

1. Abra o navegador e acesse `http://localhost/projeto_barber_estacio/` para carregar a página inicial.
2. Navegue pelas páginas (`about.html`, `services.html`, `gallery.html`, etc.) para validar o conteúdo estático.
3. Para testar o formulário, acesse `contacts.html` ou `form.html`, preencha os campos e envie.
4. Confirme no phpMyAdmin se o registro foi salvo na tabela `contatos`.

## Funcionalidades Implementadas

- **Landing page responsiva** com apresentação de serviços, depoimentos e CTA para agendamento.
- **Galeria e blog** (`gallery.html`, `blog.html`, `post.html`) com conteúdo demonstrativo.
- **Formulário de agendamento** integrado ao backend PHP.
- **Persistência de dados** em MySQL por meio de PDO com tratamento básico de erros.

## Melhorias Futuras

- **Validação avançada e feedback**: adicionar máscaras de telefone, validação de datas passadas e mensagens de confirmação mais visíveis.
- **Painel administrativo**: criar interface para visualização e gerenciamento dos agendamentos salvos.
- **Envio de e-mail**: notificar automaticamente a barbearia sobre novos cadastros.
- **Refatoração SCSS**: organizar variáveis, mixins e automatizar a compilação em um fluxo de build (ex.: Webpack, Gulp ou npm scripts).

## Créditos

Projeto desenvolvido pelos estudantes da disciplina de Desenvolvimento em Dispositivos Móveis da Universidade Estácio de Sá – campus Teresópolis. Utilize este repositório como base para estudos e evolução contínua do projeto.
