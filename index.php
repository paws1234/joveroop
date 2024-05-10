//sabotable ra guro ninyo ang function names so di ra problema//
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="icon" href="joverlogo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md md:w-96 w-full max-w-md">
        <h2 class="text-2xl mb-4">Login</h2>
        <form id="loginForm" action="login_process.php" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" id="username" name="username" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <input type="hidden" name="csrf_token" id="csrf_token" value="">
            <input type="submit" value="Login"
                class="w-full bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">
            <div id="errorContainer" class="text-red-500 mt-2"></div>
        </form>
        <div class="mt-4 text-center">
            <span class="text-gray-700">Not registered yet? </span>
            <a href="register.php" class="text-indigo-500 hover:text-indigo-700">Register here</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchCsrfToken();
        });

        function fetchCsrfToken() {
            fetch('csrf_token.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('csrf_token').value = data.csrf_token;
                })
                .catch(error => console.error('Error fetching CSRF token:', error));
        }

        document.getElementById('loginForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            formData.append('csrf_token', document.getElementById('csrf_token').value);
            fetch('process.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        storeUsernameSession(formData.get('username'));
                        window.location.href = 'dashboard.php';
                    } else {
                        displayError(data.error);
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        function storeUsernameSession(username) {
            sessionStorage.setItem('username', username);
        }

        function displayError(errorMessage) {
            var errorContainer = document.getElementById('errorContainer');
            errorContainer.textContent = errorMessage;
        }
    </script>

</body>

</html>
