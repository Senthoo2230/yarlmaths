<body class="bg-gradient-to-b from-gray-100 to-gray-300 min-h-screen flex flex-col">

    <!-- Main Content -->
    <div class="px-8 sm:px-20 lg:px-20 py-20 flex-grow">
        <div>
            <h1 class="text-5xl font-extrabold text-pri text-center lg:text-left">Grade</h1>
            <h2 class="text-xl font-bold text-sec py-3 text-center lg:text-left">
                Medium - <?php echo ucfirst($medium); ?>
            </h2>
            <hr class="border-t-4 border-pri">
        </div>
        
        <div class="py-10 my-2">
            <div class="flex items-center justify-center">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Box 1 -->
                    <a href="<?php echo base_url($medium.'/6'); ?>">
                        <div class="w-44 h-44 rounded-lg bg_pri flex items-center justify-center text-sec font-extrabold text-8xl shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                            6
                        </div>
                    </a>
                    <a href="<?php echo base_url($medium.'/7'); ?>">
                        <div class="w-44 h-44 rounded-lg bg_pri flex items-center justify-center text-sec font-extrabold text-8xl shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                            7
                        </div>
                    </a>
                    <a href="<?php echo base_url($medium.'/8'); ?>">
                        <div class="w-44 h-44 rounded-lg bg_pri flex items-center justify-center text-sec font-extrabold text-8xl shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                            8
                        </div>
                    </a>
                    <a href="<?php echo base_url($medium.'/9'); ?>">
                        <div class="w-44 h-44 rounded-lg bg_pri flex items-center justify-center text-sec font-extrabold text-8xl shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                            9
                        </div>
                    </a>
                    <a href="<?php echo base_url($medium.'/10'); ?>">
                        <div class="w-44 h-44 rounded-lg bg_pri flex items-center justify-center text-sec font-extrabold text-8xl shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                            10
                        </div>
                    </a>
                    <a href="<?php echo base_url($medium.'/11'); ?>">
                        <div class="w-44 h-44 rounded-lg bg_pri flex items-center justify-center text-sec font-extrabold text-8xl shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                            11
                        </div>
                    </a>
                    <a href="<?php echo base_url($medium.'/12'); ?>">
                        <div class="w-44 h-44 rounded-lg bg_pri flex items-center justify-center text-sec font-extrabold text-8xl shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                            12
                        </div>
                    </a>
                    <a href="<?php echo base_url($medium.'/13'); ?>">
                        <div class="w-44 h-44 rounded-lg bg_pri flex items-center justify-center text-sec font-extrabold text-8xl shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                            13
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="absolute bottom-24 left-6 z-10 hidden sm:block">
        <a href="javascript:history.back()">
            <button class="bg_pri text-sec px-4 py-2 rounded-lg shadow-md hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                ← Back
            </button>
        </a>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white px-6 py-3 lg:fixed lg:bottom-0 lg:left-0 w-full">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-2 sm:gap-0 text-sm">
            <div class="font-semibold">Quick Download</div>
            <div>Powered by <span class="text-[#ff6500] font-bold">S.Senthooran (B.Sc, Hons)</span></div>
            <div class="flex items-center gap-1">
                <i class="fab fa-facebook"></i>
                <span>/yarlmaths</span>
            </div>
            <div class="flex items-center gap-1">
                <i class="fas fa-phone"></i>
                <span>077 84 34 368</span>
            </div>
        </div>
    </footer>

</body>
