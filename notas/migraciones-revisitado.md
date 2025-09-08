<img src="imagenes/laravel-eloquent-orm.png">

# Modelos + flags

## Generación de un modelo: 
    php artisan make:model Nombre -mcrs

## Ejecución: 

1. correr migraciones
2. correr seeders

### opción a

    php artisan db:seed --class=CategoriaSeeder  
    php artisan db:seed --class=ProductoSeeder

### opción b
> en DatabaseSeeder agregar

        $this->call([
            Model1Seeder::class,
            Model2Seeder::class,
            Model3Seeder::class
        ]);

> en terminar ejecutar: 

    php artisan db:seed 
