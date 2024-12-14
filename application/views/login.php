
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
    <!-- Logo Section -->
    <div class="flex flex-col items-center mb-6">
      <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="w-24 h-24 mb-4">
      <h1 class="text-2xl font-bold text-sec">Welcome Back</h1>
    </div>
    <!-- Login Form -->
    <form action="#" method="POST">
      <!-- Username Input -->
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-600 mb-1">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-orange-300 focus:border-orange-300 outline-none"
          placeholder="Enter your username">
      </div>
      <!-- Password Input -->
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-gray-600 mb-1">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-orange-300 focus:border-orange-300 outline-none"
          placeholder="Enter your password">
      </div>
      <!-- Submit Button -->
      <button 
        type="submit" 
        class="w-full bg_pri text-sec py-2 rounded-lg hover:text-[#ff6500] hover:bg-[#0b192c] transition duration-200">
        Login
      </button>
    </form>
    <!-- Footer Links -->
    <div class="mt-6 text-center text-sm text-gray-600">
      <p>Don't have an account? <a href="<?php echo base_url('admin/register'); ?>" class="text-pri hover:underline">Sign up</a></p>
    </div>
  </div>
</body>
