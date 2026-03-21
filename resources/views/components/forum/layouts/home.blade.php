<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Forum</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Montserrat+Alternates:wght@300;400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="h-screen flex flex-col">
        <div class="px-4">

            <!-- navbar -->
            <x-forum.navbar />
        </div>

        <div class="relative h-full flex items-center justify-center">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu blur-3xl sm:-top-80">
                <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#0b83ae] to-[#7f06bb] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

            <div class="max-w-2xl">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div class="rounded-full px-4 py-2 text-sm text-gray-600 border border-gray-300 font-montserrat">
                        Get answers to your programming questions. <a href="#" class="font-semibold text-indigo-600">About &rarr;</a>
                    </div>
                </div>

                <div class="text-center">
                    <h1 class="text-5xl font-semibold text-gray-900 sm:text-7xl font-montserrat">Welcome to your favorite forum</h1>
                    <p class="my-8 text-lg font-medium text-gray-500 sm:text-xl font-montserrat">It's a place to share, learn, and grow in the world of programming. Join our community, take part in discussions, and
                    learn from other professionals.</p>
                    <div class="flex items-center justify-center gap-6">
                        <a href="{{ route('questions.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 font-montserrat">Ask</a>
                        <a href="#" class="text-sm font-semibold text-gray-900 font-montserrat">Login &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 mb-8">
        {{ $slot }}
    </div>
</body>

</html>
