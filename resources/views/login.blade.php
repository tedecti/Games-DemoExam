<script src="https://cdn.tailwindcss.com"></script>
<div class="max-w-2xl mx-auto">
  <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm p-4 sm:p-6 lg:p-8">
    <form class="space-y-6  " action="{{ route('login') }}" method="post">
      @csrf
      <h3 class="text-xl font-medium text-gray-900">Sign in to our platform</h3>
      <div>
        <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Username</label>
        <input type="text" name="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required="">
      </div>
      <div>
        <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Your password</label>
        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required="">
      </div>
      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
    </form>
  </div>