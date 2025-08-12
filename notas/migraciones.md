# migraciones

> las migraciones son clases que vamos a utilizar para crear o modificar o incluso eliminar tablas dentro de una base de datos
> podemos crear una migración con el siguiente comando

    php artisan make:migration create_personas_table

> esta migración tiene un método up() para crear una tabla y un método down() para eliminar la tabla
> en el método up() vamos a crear la estructura de nuestra tabla

> las migraciones se corren (ejecutan) con el comando

    php artisan migrate 

> nota: no es obligatorio crear tablas con migraciones
> perfectamente podemos importar un backup de manera tradicional