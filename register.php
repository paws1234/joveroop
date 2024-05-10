// Mao niy register page sabotable ra ang functions ash/llloyd//
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
		 <link rel="icon" href="joverlogo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .notification-container {
            position: relative;
            width: 100%;
        }

        .notification {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full">
        <h2 class="text-3xl font-bold mb-4">Registration</h2>
        <form id="registerForm" class="w-full">
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
            <div class="mb-4">
                <label for="confirmPassword" class="block text-gray-700">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required
                       class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <input type="hidden" name="csrf_token" id="csrf_token" value="">
            <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">Register</button>

            <div class="notification-container">
                <div id="errorNotification" class="notification mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md absolute top-0 left-0 right-0 mx-auto" role="alert">
                    <strong class="font-bold">Error:</strong>
                    <span class="block sm:inline" id="errorMessage"></span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="hideErrorNotification()">
                        <svg class="fill-current h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path fill-rule="evenodd" d="M14.354 5.646a.5.5 0 0 1 0 .708l-8 8a.5.5 0 0 1-.708-.708l8-8a.5.5 0 0 1 .708 0zM5.646 5.646a.5.5 0 0 1 0-.708l8 8a.5.5 0 0 1 .708.708l-8-8a.5.5 0 0 1-.708 0z"/>
                        </svg>
                    </span>
                </div>

                <div id="successNotification" class="notification mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md absolute top-0 left-0 right-0 mx-auto" role="alert">
                    <strong class="font-bold">Success:</strong>
                    <span class="block sm:inline" id="successMessage"></span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="hideSuccessNotification()">
                        <svg class="fill-current h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path fill-rule="evenodd" d="M14.354 5.646a.5.5 0 0 1 0 .708l-8 8a.5.5 0 0 1-.708-.708l8-8a.5.5 0 0 1 .708 0zM5.646 5.646a.5.5 0 0 1 0-.708l8 8a.5.5 0 0 1 .708.708l-8-8a.5.5 0 0 1-.708 0z"/>
                        </svg>
                    </span>
                </div>
            </div>
        </form>
        <p class="mt-4 text-gray-700">Already have an account? <a href="index.php" class="text-indigo-500 hover:text-indigo-700">Login here</a></p>
    </div>

    <script>
        fetch('csrf_token.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('csrf_token').value = data.csrf_token;
            })
            .catch(error => console.error('Error fetching CSRF token:', error));

        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var password = formData.get('password');
            var confirmPassword = formData.get('confirmPassword');
            
            if (password !== confirmPassword) {
                showErrorNotification('Passwords do not match');
                return;
            }
   
            formData.append('csrf_token', document.getElementById('csrf_token').value);
            fetch('register_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                  
                    
                    showSuccessNotification('Registration successful');
                    setTimeout(function() {
                        window.location.href = 'index.php'; 
                    }, 5000); 
                } else {
                    showErrorNotification('Registration failed: ' + data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function showErrorNotification(errorMessage) {
            var errorNotification = document.getElementById('errorNotification');
            var errorMessageElement = document.getElementById('errorMessage');

            errorMessageElement.textContent = errorMessage;
            errorNotification.style.display = 'block';
        }

        function hideErrorNotification() {
            var errorNotification = document.getElementById('errorNotification');
            errorNotification.style.display = 'none';
        }

        function showSuccessNotification(successMessage) {
            var successNotification = document.getElementById('successNotification');
            var successMessageElement = document.getElementById('successMessage');

            successMessageElement.textContent = successMessage;
            successNotification.style.display = 'block';
        }

        function hideSuccessNotification() {
            var successNotification = document.getElementById('successNotification');
            successNotification.style.display = 'none';
        }
    </script>
</body>
</html>
