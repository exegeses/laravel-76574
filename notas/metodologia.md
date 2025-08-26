# Mmetodología de trabajo

> Cuándo estemos en un equipo de desarrollo
> dónde hay varios miembros (programador) que trabajamos en el desarrollo
> no se suele crear un proyecto por cada uno de los miembros del equipo
> Si somos cinco desarrolladores en este proyecto, no sé si hace que cada uno instale el proyecto o sea no se hacen cinco instalaciones

1. solamente uno (un programador) genera la instalación del proyecto
2. Éste crea las migraciones
3. También crea los Seeders
4. También instala paquetes necesarios
5. Copia los archivos que no vayan a ser procesados por Laravel
6. Copia las vistas con sus layouts y componentes
7. Una vez listo lo sube a un repositorio

> luego el resto de los miembros del equipo de desarrollo clona el repositorio
> Y de esta manera ya tiene listo el Setup inicial del proyecto

## si no sé usar git
> si no se usar git, igualmente puedo descargar un proyecto
> en la rama correspondiente, pulsamos el botón que dice "Code"
> va a parecer un desplegable
> seleccionamos el enlace que dice "Download ZIP"
> se descomprimirá una carpeta con el nombre "repositorio/rama"
> en nuestro caso el nombre de la carpeta es: "laravel-76574-catalogo"
> lo único que nos interesa de esta carpeta en la carpeta del proyecto. O sea la carpeta llamada "catalogo"

## si sé usar git
> clonamos el proyecto con el comando
    git clone url

> en nuestro caso sería: 

    git clone https://github.com/exegeses/laravel-76574.git

## Actualizando el proyecto
> si ahora intento correr el proyecto me va a dar error
> el asunto es que no está y corazón del proyecto: la carpeta "vendor"
> ni tampoco el archivo .env

> nos movemos a la carpeta "catalogo" y corremos el siguiente comando

    composer update  

> ¿con esto ya está todo listo? aún no
> el próximo paso es crear el archivo .env y configutarlo
> no debemos olvidar generar la llave

> creaci´ón de llave

    php arisan key:generate  

## correr migraciones

    php artisan migrate  

## ejecutando el proyecto

    composer run dev  
