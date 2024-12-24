<body class="bg-gradient-to-b from-gray-100 to-gray-300 min-h-screen flex flex-col justify-between relative">

    <!-- Main Content -->
    <div class="px-10 py-10 lg:px-20 lg:py-20 flex-grow">
        <div>
            <h1 class="text-5xl font-extrabold text-pri text-center lg:text-left">
                Grade - <?php echo $grade; ?>
            </h1>
            <h2 class="text-xl font-bold text-sec py-2 text-center lg:text-left">
                Medium - <?php echo ucfirst($medium); ?>
            </h2>
            <hr class="border-t-4 border-pri mb-4">
        </div>

        <!-- Term Buttons Section -->
        <div class="h-[450px] flex items-center justify-center">
            <div class="flex flex-col sm:flex-row gap-6 items-center justify-center w-full">
                <!-- Term I Button -->
                <a href="<?php echo base_url($medium."/".$grade."/I"); ?>" class="mx-4">
                    <button class="w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                        Term I
                    </button>
                </a>

                <!-- Term II Button -->
                <a href="<?php echo base_url($medium."/".$grade."/II"); ?>" class="mx-4">
                    <button class="w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                        Term II
                    </button>
                </a>

                <!-- Term III Button -->
                <a href="<?php echo base_url($medium."/".$grade."/III"); ?>" class="mx-4">
                    <button class="w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec shadow-lg hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                        Term III
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!-- Back Button for Larger Devices -->
    <div class="absolute bottom-24 left-6 hidden lg:block">
        <a href="javascript:history.back()">
            <button class="bg_pri text-sec px-4 py-2 rounded-lg shadow-md hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                ← Back
            </button>
        </a>
    </div>

    <!-- Fixed Footer for Large Devices -->
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
