<h1 align="center">IP-Prohlizec 2.0</h1>

V tomto projektu je použit [Laravel](https://laravel.com) framework spolu s [MySQL](https://www.mysql.com/) databází.

Zde menší víčet Laravel featur z [dokumentace](https://laravel.com/docs).
- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## Pokud se rozhodnete upravovat
1. Po stažení souborů je potreba spustit

        $ composer install

2. Vytvořit .env soubor (stačí přejmenovat .env.example) se správným nastavením - **predevším připojení k databázi**

        DB_CONNECTION=mysql
        DB_PORT=3306
        DB_DATABASE=my-db-name
        DB_USERNAME=root
        DB_PASSWORD=

3. Pro vytvoření správných tabulek v db stačí
        
        $ php artisan migrate:fresh
4. Nakonec spustit dev server
        
        $ php artisan serve

@kkrystof | Kryštof Kulhánek
