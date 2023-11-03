## Adotapet

Plataforma para divulgação de animais para adoção.

![adotapet-banner](https://github.com/Golveira/adotapet/assets/30783517/7f335f1c-cd5a-4311-857a-0cfc53004631)

## Screenshots

| Pets                              | Perfil                         | Dashboard                         |
|-------------------------------------|-------------------------------------|---------------------------------------|
| ![pets list](https://github.com/Golveira/adotapet/assets/30783517/2e879a1a-9442-497f-a2cb-dfd57f619558) | ![profile](https://github.com/Golveira/adotapet/assets/30783517/3eb38877-a590-4e9b-a8a3-0f95a0ada923) | ![dashboard](https://github.com/Golveira/adotapet/assets/30783517/6e4050c4-be52-4dd6-b708-0a5a50b0caf8) || ![](screenshots/04_description.png) | ![](screenshots/05_preferences.png) | ![](screenshots/06_subscriptions.png) |

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
