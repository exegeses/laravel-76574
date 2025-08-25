<header>
    <!-- <nav class="bg-gray-800 border-b-2 border-gray-400"> -->
    <nav class="bg-gray-800 ">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <x-logo></x-logo>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <x-navigation></x-navigation>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden flex flex-1 items-center justify-center" id="mobile-menu">
            <div class="space-y-1 px-6 pt-2 pb-3 flex flex-1 items-center justify-between">
                <x-navigation></x-navigation>
            </div>
        </div>
    </nav>
</header>
