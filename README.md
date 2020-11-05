

## Desafio VOXUS

API foi criada com base no framework laravel usei própria arquitetura do mesmo, mas acrescentei uma camada de negócio (Services) para as regras de negócio deixando assim a controller livre para desepenhar apenas a suas responsabilidades.

## Tecnologia utilizadas

- **PHP**
- **Framework Laravel**
- **Migrations**
- **ORM BLADE**
- **PHPUnit Framework**

## Como executar o código

### Crie 2 bancos de dados mysql

- Crie um banco de teste e outro para aplicação
  
### Faça o download do projeto 

- git clone https://github.com/willucena/apivoxus
- cd apivoxus
- cp .env.example .env
- cp .env .env.testing

- composer install   

### Altere as informações dos arquivo .env e .env.testing
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=seu_banco
    DB_USERNAME=root
    DB_PASSWORD=sua_senha

### Execute as migrations e popule a tabela de usuários com dados fakes nos dois banco de dados 


- php artisan migrate 
- php artisan db:seed

No banco de teste

- php artisan migrate --env=testing
- php artisan db:seed --env=testing

### Para executar os testes da API execute o comando no terminal

- vendor/bin/phpunit

### Rotas você pode listar via terminal 
- php artisan route:list
  
### Detalhamento das rotas
POST | api/location  ( Para persistir dados localização enviar objeto com seguinte estrutura { user_id: 1 , latitude: "135454654" , longitude: "1232556545"})

GET  | api/user/{id}  ( Usuada para mostra localização do usuario)

GET  | api/users  (Listar todos usuários cadastrados)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
