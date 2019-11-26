# Sistema de gestão financeira (em construção)

Para inicializar o projeto após cloná-lo, fazer:

```bash
$ composer install

$ npm install

$ cp .env.example .env

$ php artisan key:generate

- Criar banco de dados vazio (MySQL)

- Editar arquivo .env linhas 12, 13 e 14

$ php artisan migrate

$ php artisan storage:link

$ php artisan serve (terminal 1)

$ npm run watch (terminal 2)
```