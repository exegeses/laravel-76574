# Trabajo con base de datos

> Laravel asume de manera predeterminada que nosotros vamos a trabajar con una base de datos
> por lo tanto utiliza por debajo PDO (PHP Database Object)

> nosotros no necesitamos crear una nueva conexión ni tampoco necesitamos generar clases para gestionar cada uno de nuestros activos ni mucho menos necesitamos relacionar parámetros
> PDOStatement()
> bindParaam()

## Capas de abstración
> Laravel tiene diferentes capas de abstracción para interactuar con las bases de datos y sus tablas

## Raw SQL
> la primera capa de atracción es el Façade DB
> esta es una clase que simplifica el trabajo con bases de datos y sus tablas
> nos provee los siguienmtes métodos: 

    DB::select();
    DB::insert();
    DB::update();
    DB::delete();

## Fluent Query Builder
> nos provee otra capa de atracción también basada en el Façade DB
> Y en este caso nos provee métodos que simplifican la generación del código SQL

    DB::table()->select();
    DB::table()->select()->where();
    DB::table()->insert();
    DB::table()->update()->where();
    DB::table()->delete()->where();

