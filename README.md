#  Spacie Article News API

<img src="https://pbs.twimg.com/media/E2Obwn8WUAAutnQ?format=jpg&name=4096x4096" alt="My cool logo"/>


<br>

## Descrição
<br>
<p>No intuito de aprendizado e teste do meu conhecimento em Laravel e testes unitários, eu desenvolvi uma API Rest 
que utiliza dados do projeto Space Flight News, uma API pública com informações relacionadas
a voos espaciais, permitindo assim a conexão de outras aplicações.</p>
<br>

## Instruções
<br>
<p>Faça um clone desse projeto.</p>

<p>Crie um banco de dados para o projeto, no arquivo .env informe o nome do banco de dados.</p>

<p>Execute os seguintes comandos para configurações da migration e seeder:</p>

```
php artisan migrate
php artisan migrate:refresh --seed
php artisan serve
```

<p>Execute o comando abaixo para realizar o consumo da API Space Flight News:</p>

```
php artisan consume:space-flight
```
<br>

## Endpoints
<br>

```
[GET]/: Retornar um Status: 200 e uma Mensagem "Space Flight News"

[GET]/articles/: Listar todos os artigos da base de dados, utilizar o sistema de paginação para não sobrecarregar a REQUEST

[GET]/articles/{id}: Obter a informação somente de um artigo

[POST]/articles/: Adicionar um novo artigo

[PUT]/articles/{id}: Atualizar um artigo baseado no id

[DELETE]/articles/{id}: Remover um artigo baseado no id
```
<br>

## Requisitos
<br>
PHP 7.4+<br>
Composer<br>
Laravel 8<br>
MySQL

<br>
Made with :blue_heart:  by Thiago Melo :wave: [see my LinkedIn](https://www.linkedin.com/in/thiago-melo-10/)