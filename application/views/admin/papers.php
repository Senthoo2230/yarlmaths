<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papers Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-[#0b192c] text-white py-4">
        <div class="container mx-auto px-6">
            <h1 class="text-2xl font-bold">Papers Management</h1>
        </div>
    </header>

    <!-- Content Section -->
    <section class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Filters (Left Side) -->
            <aside class="bg-white shadow-lg rounded-lg p-4">
                <h2 class="text-lg font-bold mb-4 text-[#0b192c]">Filters</h2>
                <!-- Filter by Grade -->
                <select class="w-full mb-3 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6500]">
                    <option hidden value="">Select Grade</option>
                    
                    <?php 
                        // Static array of grades
                        $grades = range(6, 13);
                         foreach ($grades as $grade): ?>
                            <option value="<?= $grade; ?>">Grade <?= $grade; ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Filter by Term -->
                <select class="w-full mb-3 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6500]">
                    <option value="">Select Term</option>
                    <option value="3">Term I</option>
                    <option value="2">Term II</option>
                    <option value="3">Term III</option>
                </select>
                <!-- Filter by Medium -->
                <select class="w-full mb-3 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6500]">
                    <option hidden value="">Select Medium</option>
                    <?php
                    foreach ($mediums as $medium) {
                        ?>
                            <option value="<?php echo $medium->id; ?>"><?php echo $medium->medium; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <!-- Filter Button -->
                <button class="w-full bg-[#ff6500] text-white px-4 py-2 text-sm rounded-lg font-bold hover:bg-[#e05500]">
                    Filter
                </button>
            </aside>

            <!-- Table Section -->
            <main class="col-span-1 lg:col-span-3 bg-white shadow-lg rounded-lg p-4">
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
                            <!-- Example Row -->
                            <tr class="border-b">
                                <td class="py-3 px-4">1</td>
                                <td class="py-3 px-4">
                                    Northern Province
                                    <span class="ml-2 bg-[#ff6500] text-white text-[10px] font-semibold py-1 px-2 rounded-lg">New</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <p class="bg-[#FFEBCC] font-bold text-[#FF6500] py-1 rounded-lg text-xs">Tamil</p>
                                </td>
                                <td class="py-3 px-4 text-center">I</td>
                                <td class="py-3 px-4 text-center">6</td>
                                <td class="py-3 px-4 text-center">
                                    <button class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-700">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-4">2</td>
                                <td class="py-3 px-4">Southern Province</td>
                                <td class="py-3 px-4 text-center">
                                    <p class="bg-[#D1E7DD] font-bold text-[#198754] py-1 rounded-lg text-xs">Sinhala</p>
                                </td>
                                <td class="py-3 px-4 text-center">II</td>
                                <td class="py-3 px-4 text-center">8</td>
                                <td class="py-3 px-4 text-center">
                                    <button class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-700">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-4">3</td>
                                <td class="py-3 px-4">Western Province</td>
                                <td class="py-3 px-4 text-center">
                                    <p class="bg-[#CCE5FF] font-bold text-[#0D6EFD] py-1 rounded-lg text-xs">English</p>
                                </td>
                                <td class="py-3 px-4 text-center">III</td>
                                <td class="py-3 px-4 text-center">9</td>
                                <td class="py-3 px-4 text-center">
                                    <button class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-700">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </main>

        </div>
    </section>

</body>
</html>
