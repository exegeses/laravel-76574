@include('layouts.header')
<main class="container">
    <h1>Muestreo  de datos</h1>

    El número es: {{ $numero }} {{-- handlebars  --}}

    <hr>

    @if( $numero == 15 )
        el número es correcto
    @else
        el número es incorrecto
    @endif
    <hr>

    <ul>
        @foreach( $empresas as $empresa )
            <li>{{ $empresa }}</li>
        @endforeach
    </ul>


</main>
@include('layouts.footer')
