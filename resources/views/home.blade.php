<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #7144e0 0%, #0a0116 100%);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            margin: 60px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            padding: 32px 24px;
        }

        h2 {
            margin-top: 0;
            color: #33045f;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            transition: border 0.2s;
        }

        input:focus {
            border-color: #33045f;
            outline: none;
        }

        button {
            background: linear-gradient(90deg, #33045f 0%, #cfc1e9 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 0;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover {
            background: linear-gradient(90deg, #cfc1e9 0%, #33045f 100%);
        }

        .message {
            text-align: center;
            margin-bottom: 24px;
            color: #333;
            font-size: 1.1em;
        }

        .logout-btn {
            width: 100%;
            margin-top: 16px;
        }

        .forms-wrapper {
            display: flex;
            gap: 24px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .form-box {
            flex: 1 1 180px;
            background: #f9f9f9;
            border-radius: 10px;
            padding: 18px 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        @auth
            <div class="message">
                🎉 Congrats, you are logged in as <strong>{{ auth()->user()->name }}</strong>
            </div>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>

            <div style="padding-top: 20px; padding-bottom:20px border:3px solid black;">
                <h2> Create New Post </h2>
                <form action="/create-post" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="post title">
                    <textarea name="body" placeholder="body content....."></textarea>
                    <button style="padding-top: 20px;"> Save Post</button>
                </form>
            </div>
        </div>
    @else
        <div class="forms-wrapper">
            <div class="form-box" id="register-box">
                <h2>Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Register</button>
                </form>
                <div style="text-align:center; margin-top:10px;">
                    <a href="#" id="show-login">Already have an account?</a>
                </div>
            </div>
            <div class="form-box" id="login-box" style="display:none;">
                <h2>Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <input type="text" name="loginname" placeholder="Name" required>
                    <input type="password" name="loginpassword" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
        <script>
            document.getElementById('show-login').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('register-box').style.display = 'none';
                document.getElementById('login-box').style.display = 'block';
            });
        </script>
    @endauth
    </div>
</body>

</html>
