@extends('layouts.master')
@section('title','Fund Page')
@section('content')
<body class="bg-gray-100 min-h-screen">

    <!-- Main Content -->
    <main class="p-6 flex flex-col lg:flex-row justify-center items-center lg:space-x-8">
        <!-- Left Section with Image and Info -->
        <div class="bg-white shadow-md rounded-lg p-4 lg:w-2/3">
            <div class="relative">
                <!-- Slideshow Container -->
                <div class="slideshow">
                    <img src="https://via.placeholder.com/600x300" class="rounded-lg w-full h-auto object-cover slide" alt="Slide 1">
                    <img src="https://via.placeholder.com/600x300/FF0000/FFFFFF" class="rounded-lg w-full h-auto object-cover slide" alt="Slide 2" style="display: none;">
                    <img src="https://via.placeholder.com/600x300/0000FF/FFFFFF" class="rounded-lg w-full h-auto object-cover slide" alt="Slide 3" style="display: none;">
                </div>

                <!-- Left and Right Navigation Buttons -->
                <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full" onclick="plusSlides(-1)">
                    ◀
                </button>
                <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full" onclick="plusSlides(1)">
                    ▶
                </button>
            </div>

            <div class="mt-4 flex items-center space-x-4">
                <img src="https://via.placeholder.com/50" alt="Profile" class="rounded-full">
                <div>
                    <h2 class="text-lg font-bold">PT Bertrand Jaya</h2>
                    <p class="text-gray-600">Garang Asem Jumbo - CEO</p>
                </div>
            </div>
            <p class="mt-4 text-gray-700">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo expedita neque quaerat, repudiandae,
                eligendi commodi eos odio accusamus.
            </p>
            <div class="flex items-center mt-4 space-x-6">
                <div class="flex items-center space-x-2">
                    <span>❤️</span>
                    <p>1690</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span>💬</span>
                    <p>42</p>
                </div>
            </div>
            <div class="mt-6">
                <div class="text-orange-600 font-bold text-center">
                    Rp. 696969696969 / Rp. 696969696969
                </div>
                <div class="w-full bg-gray-300 rounded-full h-4 mt-2">
                    <div class="bg-orange-400 h-4 rounded-full" style="width: 50%;"></div>
                </div>
                <p class="text-center mt-2">
                    Interested? Fund Now! <strong>2420</strong> people have already joined in!
                </p>
            </div>
            <div class="flex justify-end mt-4">
                <button class="bg-orange-400 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-md">
                    Fund Now
                </button>
            </div>
        </div>

        <!-- Right Section with Milestone/Latest Donation -->
        <div class="bg-gray-200 p-4 rounded-lg shadow-md mt-6 lg:mt-0 lg:w-1/3">
            <h2 class="text-lg font-bold mb-2">Milestone</h2>
            <ul class="space-y-2">
                <li>Contoh milestone jika donasi tercapai.</li>
                <li>Bisa juga menampilkan donasi terakhir.</li>
                <li>Berikan informasi yang relevan dengan campaign ini.</li>
            </ul>
        </div>
    </main>

    <!-- JavaScript for Slideshow -->
    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = (i === index) ? 'block' : 'none';
            });
        }

        function plusSlides(n) {
            slideIndex = (slideIndex + n + slides.length) % slides.length;
            showSlide(slideIndex);
        }

        // Show the first slide by default
        showSlide(slideIndex);
    </script>

</body>
</html>
@endsection
