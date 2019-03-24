## ``override``

Le fichier ``docker-compose.override.yml`` permet d'adapter la
configuration à l'environnement ciblé.

```
cp docker-compose.override.yml.dist docker-compose.override.yml
```

### Création du ``network``

```sh
docker network create -d bridge --subnet 172.31.0.0/16 --gateway 172.31.0.1 proxy
```

### ``UID`` et ``GID``

De façon à respecter l'``UID`` et le ``GID`` de l'environnement hôte,
il est recommandé de définir les variables suivantes dans
votre environnement (``.bashrc`` ou ``.zshrc``) :

```sh
test -z "$USER" && export USER=$(whoami)
test -z "$UID"  && export UID=$(id -u "${USER}")
test -z "$GID"  && export GID=$(id -g "${USER}")
```

Suivi de :

```sh
. ~/.bashrc
```

## Démarrage rapide

Après adaptation de la configuration à l'aide de l'``override``.
Le script ``compose`` peut être utilisé pour démarrer et
stopper l'ensemble des containers :

```sh
./compose start
./compose restart
./compose stop
```

## ``/etc/hosts``

```
127.0.0.1 web.docker-demo.test api.docker-demo.test db.docker-demo.test
```

## Commandes utiles

```
# start
docker-compose up -d --no-recreate --build
# stop
docker-compose stop
docker-compose rm -fv
# exec
docker-compose exec api bash
# run
docker-compose run api bash
```
