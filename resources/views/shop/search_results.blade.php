<x-app-layout>
    <div dir="rtl" class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="bg-white shadow rounded-lg p-4 mb-6 text-center">
                <h2 class="font-semibold text-2xl text-gray-800">
                    نتائج البحث عن: "{{ $query }}"
                </h2>
            </header>

            @if($products->isEmpty())
                <p class="text-center text-gray-500">لم يتم العثور على نتائج.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        {{-- استخدم نفس كود بطاقة المنتج مع دعم RTL داخلها --}}
                        @include('components.product-card', ['product' => $product])
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
