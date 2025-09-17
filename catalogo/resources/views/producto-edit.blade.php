@include('layouts.header')
@include('layouts.nav-bar')

<main>
    <div class="mx-auto max-w-4xl py-12 px-8">

        <h1 class="text-2xl flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
            Modificación de un producto
        </h1>

        <div class="shadow-md sm:rounded-lg">
            <!-- formulario -->
            <form action="/producto/{{$producto->idProducto}}/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="prdNombre" id="prdNombre"
                           class="block py-2.5 px-0 w-full text-2xl bg-transparent border-0 border-b-2 appearance-none text-teal-400 border-gray-600 focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" "
                           value="{{ old('prdNombre', $producto->prdNombre) }}">
                    <label for="prdNombre" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-blur:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre del producto</label>
                    @if ($errors->has('prdNombre'))
                        <span class="text-sm text-rose-400">{{ $errors->first('prdNombre') }}</span>
                    @endif
                </div>

                <div class="relative z-0 w-full mb-6 mt-2 group">
                    <input type="text" name="prdPrecio" id="prdPrecio"
                           class="block py-2.5 px-0 w-full text-2xl bg-transparent border-0 border-b-2 border-gray-300 appearance-none text-teal-400 dark:border-gray-600 focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" "
                           value="{{ old('prdPrecio', $producto->prdPrecio) }}">
                    <label for="prdPrecio" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Precio del producto</label>
                    @if ($errors->has('prdPrecio'))
                        <span class="text-sm text-rose-400">{{ $errors->first('prdPrecio') }}</span>
                    @endif
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <select name="idMarca" id="idMarca" class="block py-2.5 px-0 w-full text-2xl bg-transparent border-0 border-b-2 appearance-none text-teal-400 border-gray-600 focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" ">
                        <option value="">Seleccione una marca</option>
                        @foreach( $marcas as $marca )
                        <option @selected($marca->idMarca == old('idMarca', $producto->idMarca)) value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
                        @endforeach
                    </select>
                    <label for="idMarca" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Marca del producto</label>
                    @if ($errors->has('idMarca'))
                        <span class="text-sm text-rose-400">{{ $errors->first('idMarca') }}</span>
                    @endif
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <select name="idCategoria" id="idCategoria" class="block py-2.5 px-0 w-full text-2xl bg-transparent border-0 border-b-2 appearance-none text-teal-400 border-gray-600 focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" ">
                        <option value="">Seleccione una categoría</option>
                        @foreach( $categorias as $categoria )
                        <option @selected($categoria->idCategoria == old('idCategoria', $producto->idCategoria)) value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
                        @endforeach
                    </select>
                    <label for="idCategoria" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Categoría del producto</label>
                    @if ($errors->has('idCategoria'))
                        <span class="text-sm text-rose-400">{{ $errors->first('idCategoria') }}</span>
                    @endif
                </div>

                <div class="relative z-0 w-full mb-6 group">
                            <textarea name="prdDescripcion" id="prdDescripcion" rows="4" class="resize-none block py-2.5 px-0 w-full text-2xl bg-transparent border-0 border-b-2 appearance-none text-teal-400 border-gray-600 focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" "
                            >{{ old('prdDescripcion', $producto->prdDescripcion) }}</textarea>
                    <label for="prdDescripcion" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripción del producto</label>
                    @if ($errors->has('prdDescripcion'))
                        <span class="text-sm text-rose-400">{{ $errors->first('prdDescripcion') }}</span>
                    @endif
                </div>

                <div class="custom-file mt-1 mb-4">
                    <label for="imgActual" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> Imagen actual:</label>
                    <div class="w-full flex justify-center">
                        <img src="/imgs/productos/{{ $producto->prdImagen }}" class="img-thumbnail" id="imgActual">
                    </div>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <input type="file" name="prdImagen" id="prdImagen" class="block py-2.5 px-0 w-full text-2xl bg-transparent border-0 border-b-2 appearance-none bg-transparent text-teal-400 focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer">
                    <label for="prdImagen" class="peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Imagen del producto (*OPCIONAL)</label>
                    @if ($errors->has('prdImagen'))
                        <span class="text-sm text-rose-400">{{ $errors->first('prdImagen') }}</span>
                    @endif
                </div>

                <input type="hidden" name="idProducto"
                       value="{{ $producto->idProducto }}">
                <input type="hidden" name="imgActual"
                       value="{{ $producto->prdImagen }}">

                <div class="flex justify-between">
                    <button type="submit" class="text-white bg-teal-800 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-700 dark:hover:bg-teal-600 dark:focus:ring-teal-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="float-left w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Modificar producto
                    </button>

                    <a href="/productos" type="button" class="ml-4 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="float-left w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                        </svg>
                        Volver a panel de productos
                    </a>
                </div>

            </form>
            <!-- FIN formulario -->
        </div>

    </div>
</main>

@include('layouts.footer')
