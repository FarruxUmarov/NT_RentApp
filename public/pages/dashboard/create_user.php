<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foydalanuvchi Yaratish</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-semibold text-center mb-6">Foydalanuvchi Yaratish</h2>
    <form action="/createUser" method="POST">
        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-medium mb-2">Username:</label>
            <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="position" class="block text-gray-700 font-medium mb-2">Position:</label>
            <input type="text" id="position" name="position" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Gender:</label>
            <div class="flex items-center">
                <input type="radio" id="male" name="gender" value="male" class="mr-2">
                <label for="male" class="mr-4">Male</label>
                <input type="radio" id="female" name="gender" value="female" class="mr-2">
                <label for="female">Female</label>
            </div>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone:</label>
            <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Yaratish</button>
    </form>
</div>
</body>
</html>