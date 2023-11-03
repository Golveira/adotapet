## Adotapet

Plataforma para divulgação de animais para adoção.

![homepage](https://github.com/Golveira/adotapet/assets/30783517/796741d6-4758-4180-b221-0a4e8fc684fd)

## Screenshots

| Pets                              | Perfil                         | Admin                         |
|-------------------------------------|-------------------------------------|---------------------------------------|
|![pet listing](https://github.com/Golveira/adotapet/assets/30783517/412073db-30ad-4334-ad00-6a028cf3b8dd)|![profile](https://github.com/Golveira/adotapet/assets/30783517/3eb38877-a590-4e9b-a8a3-0f95a0ada923)|![admin](https://github.com/Golveira/adotapet/assets/30783517/9d16d9c3-8cb1-4745-a6fc-bc76975a39ac)|

## Tecnologias

Construído com a [TALL Stack](https://tallstack.dev/)

## Funcionalidades

-   Cadastro de usuários
-   Listagem e filtragem de animais
-   Gerenciamento de animais
-   Visualização de perfil de usuários
-   Favoritar animais
-   Painel administrativo

## Instalação

```bash
$ git clone https://github.com/Golveira/adotapet.git
$ cd adotapet
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate --seed
$ php artisan storage:link
$ npm install
$ npm run dev
$ php artisan serve
```

## Cadastro e login

Após a instalação acesse [http://localhost:8000/login](http://localhost:8000/login).

Você poderá se cadastrar manualmente ou utilizar um usuário existente:

-   **Usuário:**
    -   email: user@user.com
    -   senha: user
-   **Admin:**
    -   email: admin@admin.com
    -   senha: admin

## Testes

Para rodar os testes digite o comando

```bash
$ php artisan test
```
