@include("layouts.header")

    <main class="container">

        <h1>Baja de una persona</h1>

        <!-- formulario -->
        <section class="shadow-md rounded-md max-w-3xl my-16 bg-gray-800">
            <form action="/persona/{{$persona->id}}/delete" method="post">
                @method('delete')
                @csrf

            <article class="alert border-warning shadow rounded">
                <div class="pb-3 border-bottom text-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                    Advertencia
                </div>
                <div class="card-body">
                    <p class="fs-3">Se eliminarán lo siguientes datos:</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-2">Nombre:</div>
                        <div class="col-10">{{ $persona->nombre }}</div>
                    </div>
                    <div class="row">
                        <div class="col-2">Apellido:</div>
                        <div class="col-10">{{ $persona->apellido }}</div>
                    </div>
                    <div class="row">
                        <div class="col-2">DNI:</div>
                        <div class="col-10">{{ $persona->dni }}</div>
                    </div>
                    <div class="row">
                        <div class="col-2">Nacimiento:</div>
                        <div class="col-10">{{ $fecha }}</div>
                    </div>
                </div>

                <div class="m-3">
                    <input type="hidden" name="id"
                           value="{{ $persona->id }}">
                    <input type="hidden" name="nombre"
                           value="{{ $persona->nombre }}">
                    <input type="hidden" name="apellido"
                           value="{{ $persona->apellido }}">
                    <button type="submit" class="btn btn-warning">Enviar</button>
                </div>

            </article>

            </form>
        </section>
        <!-- FIN formulario -->

    </main>
@include('layouts.footer')
