<x-app-layout>
    <div dir="rtl" class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="bg-white shadow rounded-lg p-4 mb-6 text-center">
                <h2 class="font-semibold text-2xl text-gray-800">🛍️ المنتجات في تصنيف: {{ $category->name }}</h2>
            </header>

            <div class="bg-white shadow rounded-lg p-6">
                @if ($products->isEmpty())
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg">لا توجد منتجات حالياً</p>
                        <svg class="mx-auto mt-4 w-16 h-16 text-gray-300" fill="none" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h18M9 3v18M15 3v18M3 9h18M3 15h18" />
                        </svg>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                            <div dir="rtl"
                                class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow hover:shadow-lg transition-all p-4">

                                @if ($product->image)
                                    <img src="{{ asset('uploads/' . $product->image) }}"
                                        alt="صورة المنتج" class="w-full h-48 object-cover mb-4">
                                @else
                                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 mb-4">
                                        لا صورة
                                    </div>
                                @endif

                                <div class="flex items-start justify-between mb-1">
                                    <h3 class="text-lg font-bold text-gray-800">{{ $product->name }}</h3>
                                    <p class="text-indigo-600 text-md font-semibold whitespace-nowrap">
                                        {{ number_format($product->price, 2) }} <span class="text-sm">دولار</span>
                                    </p>
                                </div>

                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 60) }}</p>

                                <a href="https://wa.me/رقم_واتساب_الخاص_بك?text=أريد طلب {{ urlencode($product->name) }}"
                                    target="_blank"
                                    class="block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded text-center transition duration-200">
                                    اطلب عبر واتساب
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
