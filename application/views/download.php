<body>
  <div class="px-10 lg:px-20 py-20">
    <div>
      <h1 class="text-5xl font-bold text-pri"> <?php 
                $medium_txt = ucfirst($medium);
                echo "Grade -".$grade; ?> </h1>
      <h2 class="text-xl font-bold text-sec py-3"> Medium - <?php echo $medium_txt."/Term-".$term; ?> </h2>
      <hr>
    </div>
    <div class="flex items-center justify-center py-20">
      <div class="overflow-x-auto">
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
            <tr class="border-t border-b border-gray-500">
              <td class="px-4 py-2">1</td>
              <td class="px-4 py-2">J/Jaffna Hindu College</td>
              <td class="px-4 py-2">2024</td>
              <td class="px-4 py-2">
                <a href="">
                    <button class="bg_pri px-5 py-1 rounded-lg text-sec text-sm">
                        Download
                    </button>
                </a>
              </td>
            </tr>

            <tr class="border-t border-b border-gray-500">
              <td class="px-4 py-2">2</td>
              <td class="px-4 py-2">J/Jaffna Hindu College</td>
              <td class="px-4 py-2">2024</td>
              <td class="px-4 py-2">
                <a href="">
                    <button class="bg_pri px-5 py-1 rounded-lg text-sec text-sm">
                        Download
                    </button>
                </a>
              </td>
            </tr>

            <tr class="border-t border-b border-gray-500">
              <td class="px-4 py-2">3</td>
              <td class="px-4 py-2">J/Jaffna Hindu College</td>
              <td class="px-4 py-2">2024</td>
              <td class="px-4 py-2">
                <a href="">
                    <button class="bg_pri px-5 py-1 rounded-lg text-sec text-sm">
                        Download
                    </button>
                </a>
              </td>
            </tr>
            
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>