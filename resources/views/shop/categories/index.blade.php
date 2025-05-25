<x-app-layout>
    <div dir="rtl" class="py-10 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="bg-white shadow-md rounded-lg p-6 mb-8 text-center">
                <h2 class="font-semibold text-3xl text-gray-800 tracking-wide">🧱 تصنيفات مواد البناء</h2>
                <p class="text-gray-500 mt-2">اختر نوع المواد التي تبحث عنها</p>
            </header>

            <div class="bg-white shadow rounded-lg p-6">
                @if($categories->isEmpty())
                    <div class="text-center py-16">
                        <p class="text-gray-500 text-xl">لا توجد تصنيفات حالياً</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($categories as $category)
                            <a href="{{ route('shop.categories.show', $category->id) }}"
                               class="group block border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-xl transition-all bg-white text-center hover:bg-orange-50">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="text-4xl mb-3">
                                        🛠️ {{-- أو يمكنك تخصيص رمز تعبيري مختلف لكل تصنيف إن أردت --}}
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600">
                                        {{ $category->name }}
                                    </h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
