<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Sobre
MoveMe: aplicação para promover pontos turísticos e eventos relacionados. 
Desenvolvido com Laravel 5.8, PHP 7.1 e MySQL.

## Requisitos

- Necessário PHP 7.1 ou mais recente.
- Necessário PHP GD
- Necessário Composer
- Necessário NPM

## Instalação

- Usuando o git, clonar este repositório.
- Dentro da pasta do projeto, rodar o comando "composer install"
- Criar um arquivo .env e copiar o conteúdo do arquivo .env.exemple para dentro dele e salvar.
- No arquivo .env setar as configurações do seu banco de dados (EXEMPLO: DB_CONNECTION=mysql            DB_HOST=cmoveme-mysql DB_PORT=3306 DB_DATABASE=moveme DB_USERNAME=user DB_PASSWORD=user).
- Depois de setar as configurações de banco de dados rodar o comando "php artisan migrate", se as configurações de banco de dados estiverem corretas as tabelas seram criadas, caso aconteça algum erro revise a instrução anterior.
- Também no arquivo .env setar o ambiente de funcionamento (EXEMPLO: APP_NAME=moveme APP_ENV=local ou production APP_DEBUG=true ou false (mostrar erros) APP_URL=seu dominio).
- Dentro da pasta do projeto rodar "php artisan key:generate".
- Dentro da pasta do projeto rodar "php artisan storage:link".
- Dentro da pasta do projeto rodar "php artisan db:seed".
- Dentro da pasta do projeto rodar "npm install", "npm run dev"
- Depois disso, o projeto está pronto, no servidor fazer o apontamento para a pasta public, na raiz do projeto.
