<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 bg-white border-b border-gray-200">
                        <div class="bg-white">
                            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                                <h2 class="sr-only">Products</h2>

                                <div
                                    class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fmy-pick-up-artist-system-8340a25317-f99eabbf782b2b25c09cbe9bcc7dcc56.jpg&amp;w=3840&amp;q=75"
                                                alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">The Main Heroines are Trying to Kill</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600"> 42 Chapters : Last updated
                                            10
                                            months ago</p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fclassroom-of-the-elite-1634201687657.jpg&amp;w=3840&amp;q=75"
                                                alt="Olive drab green insulated bottle with flared screw lid and flat top."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">My Necromancer Class</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Feleceed-1634229218497.jpg&amp;w=3840&amp;q=75"
                                                alt="Person using a pen to cross a task off a productivity paper card."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">MMORPG: Rebirth as an Alchemist</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fthe-angel-next-door-spoils-me-rotten-15756.jpg&amp;w=3840&amp;q=75"
                                                alt="Hand holding black machined steel mechanical pencil with brass tip and top."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">The Imbecile Lord Is Married to Five</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <!-- More products... -->
                                </div>

                                <div
                                    class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fendless-upgrade-system-16276.jpg&amp;w=3840&amp;q=75"
                                                alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">The Main Heroines are Trying to Kill</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600"> 42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Feleceed-1634229218497.jpg&amp;w=3840&amp;q=75"
                                                alt="Olive drab green insulated bottle with flared screw lid and flat top."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">My Necromancer Class</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fclassroom-of-the-elite-1634201687657.jpg&amp;w=3840&amp;q=75"
                                                alt="Person using a pen to cross a task off a productivity paper card."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">MMORPG: Rebirth as an Alchemist</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fthe-angel-next-door-spoils-me-rotten-15756.jpg&amp;w=3840&amp;q=75"
                                                alt="Hand holding black machined steel mechanical pencil with brass tip and top."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">The Imbecile Lord Is Married to Five</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <!-- More products... -->
                                </div>

                                <div
                                    class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fmy-pick-up-artist-system-8340a25317-f99eabbf782b2b25c09cbe9bcc7dcc56.jpg&amp;w=3840&amp;q=75"
                                                alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">The Main Heroines are Trying to Kill</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600"> 42 Ch : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fclassroom-of-the-elite-1634201687657.jpg&amp;w=3840&amp;q=75"
                                                alt="Olive drab green insulated bottle with flared screw lid and flat top."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">My Necromancer Class</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fclassroom-of-the-elite-1634201687657.jpg&amp;w=3840&amp;q=75"
                                                alt="Person using a pen to cross a task off a productivity paper card."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">MMORPG: Rebirth as an Alchemist</h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <a href="#" class="group">
                                        <div
                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            <img src="https://lightnovels.me/_next/image?url=http%3A%2F%2Flightnovels.me%2F%2Fuploads%2Fthumbs%2Fthe-angel-next-door-spoils-me-rotten-15756.jpg&amp;w=3840&amp;q=75"
                                                alt="Hand holding black machined steel mechanical pencil with brass tip and top."
                                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">The Imbecile Lord Is Married to Five
                                        </h3>
                                        <p class="mt-2 text-sm font-medium text-yellow-600">42 Ch. : Updated 10 months
                                            ago
                                        </p>
                                    </a>

                                    <!-- More products... -->
                                </div>

                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div
                                    class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                    <div class="flex-1 flex justify-between sm:hidden">
                                        <a href="#"
                                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            Previous </a>
                                        <a href="#"
                                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            Next </a>
                                    </div>
                                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div>
                                            <p class="text-sm text-gray-700">
                                                Showing
                                                <span class="font-medium">1</span>
                                                to
                                                <span class="font-medium">10</span>
                                                of
                                                <span class="font-medium">97</span>
                                                results
                                            </p>
                                        </div>
                                        <div>

                                        </div>


                                    </div>
                                </div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                    aria-label="Pagination">
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Previous</span>
                                        <!-- Heroicon name: solid/chevron-left -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                                    <a href="#" aria-current="page"
                                        class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        1 </a>
                                    <a href="#"
                                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        2 </a>
                                    <a href="#"
                                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                                        3 </a>
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                        ... </span>
                                    <a href="#"
                                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                                        8 </a>
                                    <a href="#"
                                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        9 </a>
                                    <a href="#"
                                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        10 </a>
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Next</span>
                                        <!-- Heroicon name: solid/chevron-right -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
