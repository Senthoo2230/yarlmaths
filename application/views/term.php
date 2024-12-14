<body>
    <div class="px-20 py-20">
        <div>
            <h1 class="text-5xl font-bold text-pri">
                <?php 
                $medium_txt = ucfirst($medium);
                echo "Grade -".$grade; ?>
                </h1> 
                <h2 class="text-xl font-bold text-sec py-3"> Medium - <?php echo ucfirst($medium); ?></h2>
            <hr>
        </div>
        <div class="h-[500px]">
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-center justify-center h-full">
                <a href="<?php echo base_url($medium."/".$grade."/I"); ?>" class="mx-4">
                    <button class="btn_main w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec hover:text-[#ff6500] hover:bg-[#0b192c] duration-300">
                        Term I
                    </button>
                </a>
                <a href="<?php echo base_url($medium."/".$grade."/II"); ?>" class="mx-4">
                    <button class="btn_main w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec hover:text-[#ff6500] hover:bg-[#0b192c] duration-300">
                        Term II
                    </button>
                </a>
                <a href="<?php echo base_url($medium."/".$grade."/III"); ?>" class="mx-4">
                    <button class="btn_main w-[200px] py-5 bg_pri text-2xl font-bold rounded-lg text-sec hover:text-[#ff6500] hover:bg-[#0b192c] duration-300">
                        Term III
                    </button>
                </a>
            </div>
        </div>
        
    </div>
</body>