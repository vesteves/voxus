# Como usar
1. Clone o projeto;
2. Execute o `composer install`;
3. Copie o arquivo `.env.example` e crie um arquivo chamado `.env` o usando como base;
4. Crie um banco de dados MySQL;
5. Edite o arquivo `.env` e coloque o nome do banco em `DB_DATABASE`;
6. Execute `php artisan key:generate`;
7. Execute `php artisan migrate --seed`;
8. Em prod, atentar para mudar a variável `LOCATION_TESTING` do `.env` para `true` pois o pacote de geolocalização dá um IP para teste;

## Para rodar os testes
`php artisan test`

## Testes em Produção:
```
{
	"user_id": 2
}

POST http://voxus-api.acefactory.com.br/api/geolocalization/store
```

```
{
	"user_id": 2
}

POST http://voxus-api.acefactory.com.br/api/geolocalization/show
```

Obs: a Cloudflare trava o IP com a localização da própria cloudflare. É necessário fazer uma configuração para que isto não seja um empecilho.
