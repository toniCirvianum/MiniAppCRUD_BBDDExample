# MiniAppCRUD — PHP MVC amb MySQL

Aquest projecte és una aplicació didàctica desenvolupada en **PHP 8.3** amb l'arquitectura **MVC** (Model–Vista–Controlador), un **Router** i una base de dades **MySQL** accessible mitjançant **PDO**.

Permet practicar la consulta i gestió de productes i entendre com substituir progressivament l'emmagatzematge en sessions per consultes a una base de dades. Inclou les classes `Database`, `Schema` i `Seeder` per gestionar la connexió, la creació de taules i les dades inicials.

L'entorn es desplega amb **Docker Compose** i consta de tres serveis:

- **PHP + Apache:** executa l'aplicació web.
- **MySQL:** emmagatzema les dades.
- **phpMyAdmin:** permet administrar la base de dades des del navegador.

> **Nota:** el projecte és una pràctica en desenvolupament: part dels mètodes del model `Product` encara utilitzen sessions i estan pendents d'adaptar-se a MySQL.

## Requisits

- Docker i Docker Compose instal·lats.

## Posar en marxa el projecte

1. Obre un terminal a la carpeta del projecte (on hi ha `compose.yml`).
2. Si no tens el fitxer `.env`, crea'l a partir de l'exemple:

   ```bash
   cp .env.example .env
   ```

3. Revisa al `.env` els ports i les credencials de MySQL.
4. Construeix la imatge de PHP i inicia els contenidors:

   ```bash
   docker compose up -d --build
   ```

5. Obre els serveis al navegador:

   - **Aplicació:** http://localhost:8089
   - **phpMyAdmin:** http://localhost:8090

   Aquests són els ports configurats per defecte a l'exemple; es poden modificar amb `APP_PORT` i `PHPMYADMIN_PORT` al `.env`.

Per entrar a phpMyAdmin, utilitza els valors `DB_USER` i `DB_PASSWORD` del fitxer `.env`.

> En accedir per primera vegada a la ruta `/`, l'aplicació comprova si existeix la taula `products` i, si no existeix, la crea i hi insereix dades de prova.

## Aturar el projecte

Per aturar i eliminar els contenidors, **sense perdre les dades de MySQL**:

```bash
docker compose down
```

Per tornar-lo a iniciar:

```bash
docker compose up -d
```

Les dades de MySQL es conserven en el volum Docker `db_miniApp` (definit com a `mysql_data` al Compose).

**Atenció:** la comanda següent també elimina els volums i, per tant, **esborra les dades de la base de dades**:

```bash
docker compose down -v
```

## Comandes útils

```bash
# Consultar l'estat dels serveis
docker compose ps

# Veure els registres dels contenidors
docker compose logs -f

# Reconstruir la imatge si es modifica el Dockerfile
docker compose up -d --build
```

> Les credencials s'han de configurar al `.env` i no s'han de publicar al repositori. Si la base de dades ja s'ha inicialitzat, canviar la contrasenya al `.env` no actualitza automàticament l'usuari MySQL existent.