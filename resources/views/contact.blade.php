<x-app-layout>
    <div class="py-10 bg-gray-50" dir="rtl">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- العنوان -->
            <header class="bg-white shadow rounded-lg p-4 mb-6 text-center">
                <h2 class="font-semibold text-2xl text-gray-800">
                    📬 تواصل معنا
                </h2>
            </header>

            <!-- النموذج -->
            <div class="bg-white shadow rounded-lg p-6">
                <form method="POST" action="#">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">الاسم <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required
                            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="اسمك الكامل">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">البريد الإلكتروني <span
                                class="text-red-500">*</span></label>
                        <input type="email" name="email" required
                            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="example@email.com">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">الرسالة <span class="text-red-500">*</span></label>
                        <textarea name="message" required
                            class="w-full border border-gray-300 rounded p-2 h-32 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="اكتب رسالتك هنا..."></textarea>
                    </div>

                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                        إرسال
                    </button>
                </form>
            </div>

            <!-- روابط التواصل الاجتماعي -->
            <div class="text-center mt-10">
                <h3 class="text-gray-700 text-lg font-semibold mb-3">تابعنا على:</h3>
                <div class="flex justify-center space-x-6 rtl:space-x-reverse text-4xl text-gray-700">
                    <a href="https://facebook.com" target="_blank" class="hover:text-blue-600">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="hover:text-black">
                        <i class="fab fa-x-twitter"></i> <!-- أيقونة شعار X الجديد -->
                    </a>
                    <a href="https://instagram.com" target="_blank" class="hover:text-pink-500">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/967778844220" target="_blank" class="hover:text-green-500">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
