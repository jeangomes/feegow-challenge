
## Sobre o projeto

Projeto rodando em docker, usando o [Laravel Sail](https://laravel.com/docs/9.x/sail)

- Framework PHP no backend: Laravel;
- Banco de dados usado: Mysql;
- Framework Frontend CSS: Bootstrap;
- Framework Frontend JS: VueJS;
- Para consumir a api da Feegow foi utilizado a abstração do Guzzle HTTP client oferecida pelo Laravel

Para rodar o projeto pode se usar o Laravel Sail para levantar e rodar os containers necessários para a aplicação funcionar:
- ./vendor/bin/sail up
- ./vendor/bin/sail php artisan migrate
- Configurar url e token da api conforme variáveis no arquivo .env.example
