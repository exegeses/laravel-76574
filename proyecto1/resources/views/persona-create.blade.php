@include("layouts.header")

<main class="container">

    <h1>Alta de una persona</h1>

    <!-- formulario -->
    <section class="alert shadow rounded">
        <form action="/persona/store" method="post">
            @csrf
            <div class="m-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="m-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido">
            </div>
            <div class="m-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni">
            </div>
            <div class="m-3">
                <label for="nacimiento" class="form-label">Nacimiento</label>
                <input type="date" class="form-control"
                       value="1990-01-01"
                       name="nacimiento" id="nacimiento">
            </div>
            <div class="m-3">
                <button type="submit" class="btn btn-warning">Enviar</button>
            </div>

        </form>
    </section>
    <!-- FIN formulario -->


</main>
@include('layouts.footer')
