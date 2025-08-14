@include('layouts.header')
<main class="container">

    <h1>Panel de personas</h1>

    <table class="table table-dark table-striped table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>dni</th>
            <th>nacimiento</th>
            <th colspan="2">
                <a href="#!">agregar</a>
            </th>
        </tr>
        </thead>
        <tbody class="table-group-divider">

        <tr>
            <td>{{ 'id' }}</td>
            <td>{{ 'nombre' }}</td>
            <td>{{ 'apellido' }}</td>
            <td>{{ 'dni' }}</td>
            <td>{{ 'nacimiento' }}</td>
            <td><a href="#!">editar</a></td>
            <td><a href="#!">borrar</a></td>
        </tr>

        </tbody>
    </table>


</main>
@include('layouts.footer')
