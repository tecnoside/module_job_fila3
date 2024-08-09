# Module Job
Modulo dedicato alla gestione delle operazione in Queue

## Aggiungere Modulo nella base del progetto
Dentro la cartella laravel/Modules

```bash
git submodule add https://github.com/laraxot/module_job_fila3.git Job
```

## Verificare che il modulo sia attivo
```bash
php artisan module:list
```
in caso abilitarlo
```bash
php artisan module:enable Job
```

## Eseguire le migrazioni
```bash
php artisan module:migrate Job
```