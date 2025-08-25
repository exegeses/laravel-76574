@include('layouts.header')
@include('layouts.nav-bar')

<main>
    <div class="mx-auto max-w-4xl py-12 px-8">

        <h1 class="text-2xl flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
            </svg>
            Tema de la página
        </h1>

        <!-- contenido -->

        <div class="shadow-md sm:rounded-lg">
            <x-botones href="/">
                volver a portada
            </x-botones>
        </div>
        <!-- FIN contenido -->

    </div>
</main>

@include('layouts.footer')
