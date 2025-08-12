# Views

> las vistas son básicamente lo que nosotros vemos en pantalla
> Laravel tiene un motor de plantillas para gestionar el manejo de las vistas
> éste se llama Blade
> las vistas van a estar almacenadas dentro de la carpeta

    /resources/views

> las vistas deben tener la extensión ".blade.php"
> con esta extensión va a comprender directivas Blade

## Componentes

> los componentes son pequeños fragmentos que podemos reutilizar en cada una de nuestras vistas
> un componente muy común puede ser una barra de navegación
> los componentes deben crearse dentro de una carpeta llamada

    /components

> para insertar un componente se inserta con el siguiente formato

    <x-nombre></x-nombre>

## Layouts

> el concepto de layout es básicamente un componente que utilizamos para manejar el esqueleto visual de una página

## Slots (ranura, espacio)

> un Sloth es una región dinámica que se representa con la variable reservada $slot

### creación de vistas por artisan

> generalmente cuando creamos una vista lo hacemos creando un archivo dentro de la carpeta /resources/views
> sin embargo podemos crearla con un comando de Artisan

    php artisan make:view nombre

## Directivas blade
> las directivas Blade tienen relacionado un proceso
> éstas comienzan con "@"


