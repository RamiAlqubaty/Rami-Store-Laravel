<x-app-layout>
    <div dir="rtl" class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="bg-white shadow rounded-lg p-4 mb-6 text-center">
                <h2 class="font-semibold text-2xl text-gray-800">
                    نتائج البحث عن: "{{ $query }}"
                </h2>
            </header>

            @if ($products->isEmpty())
                <p class="text-center text-gray-500">لم يتم العثور على نتائج.</p>
            @else
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
                                <div
                                    class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow hover:shadow-lg transition-all flex flex-col">

                                    <!-- صورة المنتج -->
                                    @if ($product->image)
                                        <img src="{{ asset('uploads/' . $product->image) }}"
                                            class="w-full h-48 object-cover" alt="صورة المنتج">
                                    @else
                                        <div
                                            class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                                            لا صورة
                                        </div>
                                    @endif

                                    <!-- معلومات المنتج -->
                                    <div class="flex flex-col justify-between flex-grow p-4">

                                        <!-- اسم ووصف وسعر -->
                                        <div class="flex justify-between items-start">

                                            <!-- اليمين: الاسم والوصف -->
                                            <div class="flex-1 pr-2">
                                                <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $product->name }}
                                                </h3>
                                                <p class="text-gray-600 text-sm">
                                                    {{ Str::limit($product->description, 60) }}
                                                </p>
                                            </div>

                                            <!-- اليسار: السعر -->
                                            <div class="text-left pl-2">
                                                <p class="text-indigo-600 text-md font-semibold whitespace-nowrap">
                                                    {{ number_format($product->price, 2) }} <span
                                                        class="text-sm">دولار</span>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- زر واتساب -->
                                        <div class="mt-4">
                                            <a href="https://wa.me/967778844220?text=مرحباً، أرغب بطلب المنتج: {{ urlencode($product->name) }}"
                                                target="_blank"
                                                class="block text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                                                <i class="fab fa-whatsapp mr-2"></i>طلب عبر واتساب
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
