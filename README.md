# Agenda de Contatos - AVP1 Frameworks UNIFAP-CE

## Visão Geral do Projeto

Este projeto é uma agenda de contatos simples, desenvolvida como parte da avaliação AVP1 da disciplina de Frameworks. O sistema permite o gerenciamento completo de contatos, com funcionalidades de criação, leitura, atualização e exclusão (CRUD), utilizando Laravel e Blade.

## Funcionalidades (MVP)

O projeto atende aos seguintes requisitos do Mínimo Produto Viável (MVP):

### Autenticação de Usuários
- **Registro**: Novos usuários podem se cadastrar fornecendo nome, e-mail e senha.
- **Login e Logout**: Usuários existentes podem acessar e sair do sistema de forma segura.
- **Proteção de Rotas**: As rotas de gerenciamento de contatos são protegidas, exigindo que o usuário esteja autenticado.

### Gerenciamento de Contatos
- **Adicionar Contato**: É possível adicionar novos contatos com nome, telefone, e-mail e um endereço opcional.
- **Listar Contatos**: Cada usuário visualiza apenas os contatos que cadastrou.
- **Editar Contato**: As informações de um contato existente podem ser atualizadas.
- **Remover Contato**: Um contato pode ser excluído da agenda.
- **Busca Simples**: Funcionalidade de busca para encontrar contatos por nome ou e-mail.

### Interface do Usuário
- **Layout com Blade**: A interface foi construída utilizando o sistema de templates Blade do Laravel, com componentes reutilizáveis para o cabeçalho e rodapé.
- **Página Principal**: Exibe a lista de contatos do usuário logado.
- **Formulários**: Páginas e modais dedicados para criação e edição de contatos.
- **Alertas**: O sistema fornece feedback visual para ações bem-sucedidas ou com erro.

## Integrantes da Equipe

* Gisliane Kelly Mateus da Silva
* Isaac Oliveira Menezes
* Mateus José Rosado Ferreira
* Nayelly Roberta Ferreira da Silva
* Nilza Kelly Campos Fernandes

## Como Executar o Projeto

1.  **Clonar o repositório:**
    ```bash
    git clone https://github.com/mateusrosado/simple-contact-book.git
    ```

2.  **Acessar o diretório do projeto:**
    ```bash
    cd simple-contact-book
    ```

3.  **Instalar as dependências do Composer:**
    ```bash
    composer install
    ```

4.  **Configurar o ambiente:**
    * Copie o arquivo `.env.example` para `.env`.
    * Configure as variáveis de ambiente, principalmente as de conexão com o banco de dados (`DB_*`).

5.  **Gerar a chave da aplicação:**
    ```bash
    php artisan key:generate
    ```

6.  **Executar as migrações e popular o banco de dados:**
    ```bash
    php artisan migrate --seed
    ```

7.  **Iniciar o ambiente de desenvolvimento:**
    * **Em um terminal**, inicie o servidor do Laravel:
        ```bash
        php artisan serve
        ```

8.  **Acessar a aplicação:**
    Abra o seu navegador e acesse o endereço fornecido pelo `php artisan serve` (geralmente `http://127.0.0.1:8000`).
