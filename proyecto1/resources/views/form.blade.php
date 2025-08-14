@include('layouts.header')
<main class="container">
    <h1>formulario de envío</h1>

    <form action="/proceso" method="post"
          class="alert shadow">
    @csrf
        <div class="m-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre"
                   name="nombre">
        </div>
        <div class="m-3">
            <button class="btn btn-warning">enviar</button>
        </div>

    </form>

</main>
@include('layouts.footer')
