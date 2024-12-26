
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
            <a href="<?php echo base_url('admin/papers'); ?>">
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
            <a href="<?php echo base_url('admin/upload'); ?>">
                <button class="bg-[#ff6500] text-white px-6 py-3 rounded-lg font-bold hover:bg-[#e05500]">
                    Upload
                </button>
            </a>
        </div>

        <main class="col-span-1 lg:col-span-3 bg-white shadow-lg rounded-lg p-4 mt-8">
    <!-- Success Message -->
    <div id="success-message" class="mb-4">
        <?php if ($this->session->flashdata('success')): ?>
            <p class="bg-green-100 text-green-700 text-sm font-medium py-2 px-4 rounded-lg">
                <?php echo $this->session->flashdata('success'); ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- Table Title -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Recent Uploads</h2>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#0b192c] text-white text-sm">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Filename</th>
                    <th class="py-3 px-4 text-center">Medium</th>
                    <th class="py-3 px-4 text-center">Term</th>
                    <th class="py-3 px-4 text-center">Grade</th>
                    <th class="py-3 px-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                <?php if (!empty($papers)): ?>
                    <?php foreach ($papers as $index => $paper): ?>
                        <tr class="border-b">
                            <td class="py-3 px-4"><?php echo $index + 1; ?></td>
                            <td class="py-3 px-4">
                                <?php echo htmlspecialchars($paper['name']); ?>
                                <?php if (date('Y-m-d') == date('Y-m-d', strtotime($paper['uploaded_at']))): ?>
                                    <span class="ml-2 bg-[#ff6500] text-white text-[10px] font-semibold py-1 px-2 rounded-lg">New</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <?php
                                $medium_badges = [
                                    '1' => 'bg-[#CCE5FF] text-[#0D6EFD]',
                                    '2' => 'bg-[#D1E7DD] text-[#198754]',
                                    '3'   => 'bg-[#FFEBCC] text-[#FF6500]',
                                ];
                                $medium_text =[
                                    '1' => 'Sinhala',
                                    '2' => 'English',
                                    '3'   => 'Tamil',
                                ];

                                $term_text =[
                                    '1' => 'I',
                                    '2' => 'II',
                                    '3'   => 'III',
                                ];

                                $medium_class = $medium_badges[$paper['medium']] ?? 'bg-gray-100 text-gray-700';
                                ?>
                                <p class="<?php echo $medium_class; ?> font-bold py-1 rounded-lg text-xs">
                                    <?php echo $medium_text[$paper['medium']]; ?>
                                </p>
                            </td>
                            <td class="py-3 px-4 text-center"><?php echo $term_text[$paper['medium']]; ?></td>
                            <td class="py-3 px-4 text-center"><?php echo htmlspecialchars($paper['grade']); ?></td>
                            <td class="py-3 px-4 text-center">
                                <button class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-700">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-3 px-4 text-center text-gray-500">
                            No recent uploads found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

    </main>

</body>
