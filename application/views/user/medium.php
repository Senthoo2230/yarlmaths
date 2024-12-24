<body class="bg-gradient-to-b from-gray-100 to-gray-300 min-h-screen flex flex-col justify-between relative">

    <!-- Main Content -->
    <div class="px-10 py-10 lg:px-20 lg:py-20">
        <div>
            <h1 class="text-5xl font-extrabold text-pri mb-6 text-center lg:text-left">
                Medium
            </h1>
            <hr class="border-t-4 border-pri">
        </div>
        <div class="h-[500px] flex items-center justify-center">
            <div class="flex flex-col sm:flex-row gap-6 items-center justify-center">
                <a href="<?php echo base_url('tamil'); ?>">
                    <button class="btn_main w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                        Tamil
                    </button>
                </a>
                <a href="<?php echo base_url('sinhala'); ?>">
                    <button class="btn_main w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                        Sinhala
                    </button>
                </a>
                <a href="<?php echo base_url('english'); ?>">
                    <button class="btn_main w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                        English
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="fixed bottom-20 left-6 z-10">
        <a href="javascript:history.back()">
            <button class="bg_pri text-sec px-4 py-2 rounded-lg shadow-md hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                ← Back
            </button>
        </a>
    </div>

    <!-- Fixed Footer -->
    <footer class="fixed bottom-0 left-0 w-full bg-gray-800 text-white px-6 py-3 z-10">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-2 sm:gap-0 text-sm">
            <div class="font-semibold">Quick Download</div>
            <div>Powered by <span class="text-[#ff6500] font-bold">S.Senthooran (B.Sc, Hons)</span></div>
            <div class="flex items-center gap-1 font-semibold">
                <i class="fab fa-facebook"></i> 
                <span>/yarlmaths</span>
            </div>
            <div class="flex items-center gap-1 font-semibold">
                <i class="fas fa-phone"></i> 
                <span>077 84 34 368</span>
            </div>
        </div>
    </footer>

</body>
