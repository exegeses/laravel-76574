# Laravel 12 

## Rutas & peticiones

1. ¿Qué es una petición?
> En la web, cada vez que un usuario abre una página, envía un formulario o hace clic en un enlace, su navegador envía un mensaje a un servidor para pedir algo.
> Ese mensaje se llama petición HTTP.

> 📌 Ejemplo simple:

Abrimos https://midominio.com/productos

> El navegador envía una petición al servidor:
> "Dame la página de productos".
> El servidor responde con la información pedida (HTML, JSON, imagen, etc.).
> Las peticiones tienen:

> URL → la dirección que se pide.
> Método HTTP → la acción (GET para leer, POST para enviar datos, etc.).
> Datos → información extra (campos de un formulario, parámetros en la URL, etc.).


2. ¿Qué es un enrutador?
> El enrutador es como el recepcionista de un hotel o edificio corporativo:

> Escucha todas las peticiones que llegan.
> Ve a qué “oficina” (función o controlador) debe enviarlas.
> Entrega la respuesta al usuario.

> En Laravel, el enrutador se encarga de hacer coincidir la URL y el método HTTP con un código que debe ejecutarse.

> 📌 Ejemplo:

Petición del navegador	Ruta definida en Laravel	Acción que se ejecuta
GET /	Route::get('/', ...)	Mostrar página de inicio
GET /contacto	Route::get('/contacto',...)	Mostrar formulario
POST /contacto	Route::post('/contacto',...)	Guardar mensaje

3. ¿Cómo funcionan en Laravel?
> Cuando llega una petición:

> El navegador envía la URL y el método HTTP (por ejemplo: GET /productos).

> Laravel recibe la petición y se la pasa al enrutador.

> El enrutador busca en las rutas definidas en routes/web.php o routes/api.php.

> Si encuentra una coincidencia, ejecuta el código asociado (una función o un controlador).

> La respuesta (HTML, JSON, archivo, etc.) vuelve al navegador.

> 📌 Ejemplo en Laravel:

    // routes/web.php
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return 'Bienvenido a mi sitio web';
    });


> Si el usuario entra a / 
> → el enrutador ejecuta la función y devuelve el texto.
