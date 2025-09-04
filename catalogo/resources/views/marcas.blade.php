@include('layouts.header')
@include('layouts.nav-bar')

<main>
    <div class="mx-auto max-w-4xl py-12 px-8">

        <h1 class="text-2xl flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
            </svg>
            Panel de administración de marcas
        </h1>

        @if( session('mensaje') )
            <x-alert></x-alert>
        @endif

        <div class="mt-6 p-3 flex items-center justify-end border-t border-gray-500 cursor-pointer hover:bg-gray-600">
            <x-botones href="/marca/create">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5.5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                add
            </x-botones>
        </div>
        <!-- loop -->
        @foreach( $marcas as $marca )
        <div class="p-3 flex items-center justify-between border-t border-gray-500 cursor-pointer hover:bg-gray-600">
            <div class="flex items-center">
                <div class="ml-2 flex flex-col text-xl">
                    {{ $marca->mkNombre }}
                </div>
            </div>
            <div>
                <x-botones href="/marca/{{ $marca->idMarca }}/edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5.5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    edit
                </x-botones>
                <x-botones href="/marca/delete">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5.5 mr-2">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    delete
                </x-botones>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mx-auto max-w-4xl px-8 ">
        {{ $marcas->links() }}
    </div>

</main>

@include('layouts.footer')
