<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: url('img/image2.jpg') center center fixed;
            background-size: cover;
        }

        .transparent-blur {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(2px);
        }
    </style>
</head>

<body class="bg-cover bg-center">
    <div class="flex flex-col items-center justify-center h-screen">
        <!-- Form Login -->
        <div class="bg-white p-8 rounded shadow-md w-96 transparent-blur">
            <h2 class="text-4xl font-semibold mb-4 text-white text-center">Sign In</h2>

            <form action="proses/userLogin.php" method="POST">
                <div class="mb-4">
                    <input type="text" id="username" name="username" class="mt-1 p-2 w-full border rounded-md text-sm" placeholder="Username" required>
                </div>

                <div class="mb-4">
                    <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md text-sm" placeholder="Password" required>
                </div>

                <a href="register.php" class="text-sm flex text-center justify-center mb-4">Dont have a account?</a>
                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 bg-purple-900 text-white p-2 rounded-full">Sign In</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>