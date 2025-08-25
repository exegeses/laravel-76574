<a {{ $attributes }}
                   class=" flex text-green-400 hover:text-white
                            border-2 border-green-400 hover:bg-green-700
                            focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm
                            px-4.5 py-2 text-center me-2 mb-2 dark:border-green-600 dark:text-green-300
                            dark:hover:text-white dark:hover:bg-green-700 dark:focus:ring-green-800
                            transition duration-200 ease-in-out">
    {{ $slot }}
</a>
