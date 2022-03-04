# CURE
Calculadora para el Uso Responsable de la Energía
Desarrollado para la catedra Diseño de Sistemas 2021 UTN FRLP (Argentina)

[![Version](https://img.shields.io/static/v1?label=version&message=1.0.0&color=success)](https://github.com/germannatale/cure)

## Tecnologias
[![laravel](https://img.shields.io/badge/laravel-^8.0-informational)](https://www.laravel.com/)
[![php](https://img.shields.io/badge/php-^7.4-informational)](https://www.php.net/)
[![bootstrap](https://img.shields.io/badge/bootstrap-^4.0-informational)](https://getbootstrap.com/)
[![MariaDB](https://img.shields.io/badge/mariadb-^10.4-informational)](https://mariadb.org/)


## Cliente incrustado
[![phpmyadmin](https://img.shields.io/badge/phpmyadmin-^5.1-informational)](https://www.phpmyadmin.net/)

## Instalación

### Levantar entorno en Docker
```
docker-compose up -d
````

### Instalar composer
```
docker exec -it cure_php composer install
```

### Crear variables de entorno
Crear archivo .env (puede renonbrar env.example)

### Generar llave unica para la app
```
docker exec -it cure_php php artisan key:generate
```

### Migrar datos a la DB
```
docker exec -it cure_php php artisan migrate --seed
```

### Instalar NPM
```
docker exec -it cure_php npm install
docker exec -it cure_php npm run dev
```

## Credenciales
Todos los usuarios visibles utilizan el mismo password
usuario = admin@admin.com
password = password

## Otros comandos útiles
`docker exec -it cure_php php artisan migrate:fresh --seed` Restaura la DB

`docker exec -it cure_php npm cache clean --force` Borra el cache de npm

## Pendientes
* Simulacion de gas incompleta (Calculo Costo | Unidades | Validaciones)
* Registracion de usurios (falta implentar Maileable)
* Pueden faltar algunas validaciones
* Limpiar rutas
* Limpiar templates no utilizados (blade)
