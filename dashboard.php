<?php

session_start();
session_regenerate_id(true);

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="joverlogo.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-500 to-indigo-500 min-h-screen flex items-center justify-center">
    <div class="max-w-lg p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">Welcome to the Dashboard</h1>
        <p class="text-center text-gray-600 mb-6">This is a secure area accessible only to authenticated users.</p>
        <form id="logoutForm" method="post" class="flex flex-col items-center">
            <input type="hidden" id="csrf_token" name="csrf_token" value="">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Logout</button>
        </form>
    </div>

    <script>
        function fetchCsrfToken() {
            fetch('csrf_token.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('csrf_token').value = data.csrf_token;
                })
                .catch(error => console.error('Error fetching CSRF token:', error));
        }

        document.addEventListener('DOMContentLoaded', function () {
            fetchCsrfToken();
        });

        document.getElementById('logoutForm').addEventListener('submit', function (event) {
            event.preventDefault();

            fetch('logout.php', {
                method: 'POST',
                body: new FormData(this)
            })
                .then(response => {
                    if (response.ok) {
                        window.location.href = 'index.php';
                    } else {
                        console.error('Logout failed:', response.statusText);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>
