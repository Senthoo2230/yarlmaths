<!-- Header -->
<header class="bg-[#0b192c] text-white py-4">
        <div class="container mx-auto px-6">
            <h1 class="text-2xl font-bold">Upload Papers</h1>
        </div>
    </header>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white text-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Upload File</h2>
        <form action="<?php echo base_url('paper/upload'); ?>" method="post" enctype="multipart/form-data"> 
            
             <!-- Name -->
             <div class="mb-4">
                <label for="filename" class="block mb-2 font-semibold">File Name</label>
                <input name="name" type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Name -->
            <div class="mb-4">
                <label for="year" class="block mb-2 font-semibold">Year</label>
                <input name="year" type="text" id="year" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            

            <!-- Medium -->
            <div class="mb-4">
                <label for="medium" class="block mb-2 font-semibold">Select Medium</label>
                <select id="medium" name="medium" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Choose Medium</option>
                    <option value="1">English</option>
                    <option value="2">Sinhala</option>
                    <option value="3">Tamil</option>
                </select>
            </div>

            <!-- Grade -->
            <div class="mb-4">
                <label for="grade" class="block mb-2 font-semibold">Select Grade</label>
                <select id="grade" name="grade" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Choose Grade</option>
                    <!-- Dynamically Generated Options -->
                    <option value="6">Grade 6</option>
                    <option value="7">Grade 7</option>
                    <option value="8">Grade 8</option>
                    <option value="9">Grade 9</option>
                    <option value="10">Grade 10</option>
                    <option value="11">Grade 11</option>
                    <option value="12">Grade 12</option>
                    <option value="13">Grade 13</option>
                </select>
            </div>

            <!-- Term -->
            <div class="mb-4">
                <label for="term" class="block mb-2 font-semibold">Select Term</label>
                <select id="term" name="term" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Choose Term</option>
                    <option value="1">Term I</option>
                    <option value="2">Term II</option>
                    <option value="3">Term III</option>
                </select>
            </div>

            <!-- File Upload -->
            <div class="mb-6">
                <label for="file" class="block mb-2 font-semibold">Upload File</label>
                <input name="file" type="file" id="file" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="w-full bg-[#ff6500] text-white px-6 py-3 rounded-lg font-bold hover:bg-[#e05500] transition-all duration-300">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>

