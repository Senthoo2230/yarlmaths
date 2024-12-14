
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-[#0b192c] text-white">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-xl font-bold">
                <a href="#" class="text-[#ff6500]">YarlMaths</a>
            </div>

            <!-- Navigation Links -->
            <div class="flex items-center space-x-6">
                <a href="#" class="hover:text-[#ff6500]">Home</a>
                <a href="<?php echo base_url('admin/logout'); ?>" class="hover:text-[#ff6500]">Sign Out</a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <main class="container mx-auto px-10 lg:px-40 py-12">
        <!-- Dashboard Boxes -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Downloads -->
            <div class="bg-[#15cab7] shadow-lg rounded-lg p-6 text-center flex flex-col items-center justify-center">
                <p class="font-bold text-5xl">
                    120
                </p>
                <p>
                    Downloads
                </p>
            </div>

            <!-- Papers -->
            <a href="<?php echo base_url('dashboard/papers'); ?>">
                <div class="bg-[#f6b53e] shadow-lg rounded-lg p-6 text-center flex flex-col items-center justify-center">
                    <p class="font-bold text-5xl">
                        820
                    </p>
                    <p>
                        Papers
                    </p>
                </div>
            </a>

            <!-- Contributors -->
            <div class="bg-[#e85e77] shadow-lg rounded-lg p-6 text-center flex flex-col items-center justify-center">
                    <p class="font-bold text-5xl">
                        230
                    </p>
                    <p>
                        Contributers
                    </p>
                </div>
        </div>

        <!-- Upload Button -->
        <div class="mt-8 flex justify-center">
            <button class="bg-[#ff6500] text-white px-6 py-3 rounded-lg font-bold hover:bg-[#e05500]">
                Upload
            </button>
        </div>

        
    </main>

</body>
