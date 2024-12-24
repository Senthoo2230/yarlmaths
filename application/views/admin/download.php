<body class="bg-gradient-to-b from-gray-100 to-gray-300 min-h-screen flex flex-col justify-between relative">

  <!-- Main Content -->
  <div class="px-10 lg:px-20 py-20 flex-grow">
    <div>
      <h1 class="text-5xl font-extrabold text-pri mb-6 text-center lg:text-left">
        Grade - <?php echo $grade; ?>
      </h1>
      <h2 class="text-xl font-bold text-sec py-3 text-center lg:text-left">
        Medium - <?php echo ucfirst($medium); ?> / Term - <?php echo $term; ?>
      </h2>
      <hr class="border-t-4 border-pri mb-10">
    </div>

    <!-- Table Section -->
    <div class="flex items-center justify-center py-10">
      <div class="overflow-x-auto w-full px-1 lg:w-[700px]">
        <table class="table-auto w-full border-collapse">
          <thead class="border-b-2 border-gray-500">
            <tr>
              <th class="px-4 py-2 text-left">#</th>
              <th class="px-4 py-2 text-left">From</th>
              <th class="px-4 py-2 text-left">Year</th>
              <th class="px-4 py-2 text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($records)): ?>
              <?php foreach ($records as $index => $record): ?>
                <tr class="border-t border-b border-gray-500">
                  <td class="px-4 py-2"><?= $index + 1 ?></td>
                  <td class="px-4 py-2"><?= $record['name'] ?></td>
                  <td class="px-4 py-2"><?= $record['year'] ?></td>
                  <td class="px-4 py-2">
                    <a href="<?= base_url('serveFile/' . $record['id']) ?>">
                      <button class="bg_pri px-5 py-2 rounded-lg text-sec text-sm shadow-md hover:bg-[#0b192c] hover:text-[#ff6500] transition duration-300">
                        Download
                      </button>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="px-4 py-2 text-center">No records found</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
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
