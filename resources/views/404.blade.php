<x-guest-layout>
   <x-card>
       <div class="text-center flex flex-col gap-1 justify-center items-center">
           <h1 class="text-6xl font-bold text-gray-800">404</h1>
           <h2 class="text-3xl font-medium text-gray-700">Page Not Found</h2>
           <p class="text-xl text-gray-500 mt-4">The page you are looking for could not be found.</p>
           <a href="{{ url('/') }}" class="bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600 w-60 mt-2">Go Home</a>
       </div>
   </x-card>

</x-guest-layout>
