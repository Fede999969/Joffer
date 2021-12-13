# Installazione

1. Scaricare il progetto
2. Entrare nella cartella /client
3. Eseguire nel terminale:

npm install


5. Entrare nella cartella /server
6. Eseguire nel terminale:

composer update



# Collegamento DB

Nella cartella /server cercare il file .env.example
Creare file .env uguale al file .env.example, e modificare il nome del database *DB_DATABASE = nome_db*


# Effettuare le migrazioni

Per creare la struttura del database, entrare nella cartella /server ed eseguire nel terminale:

php artisan migrate


Per aggiungere nuovi dati 


# Serve

Nella cartella /server eseguire nel terminale:

php artisan serve


Nella cartella /client eseguire nel terminale:

npm run serve
