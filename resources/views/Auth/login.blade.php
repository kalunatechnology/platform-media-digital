<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Font import */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to bottom right, #1c1c1c, #2d2d2d);
            color: #fff;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1200px;
            width: 100%;
            background: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .form-section,
        .contact-info {
            flex: 1 1 300px;
            margin: 20px;
        }

        .form-section {
            background: #222;
            padding: 20px;
            border-radius: 10px;
        }

        .form-section h2 {
            margin-bottom: 20px;
            color: #ffc107;
        }

        .form-section form .input-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-section form .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-section form .input-group input,
        .form-section form textarea {
            width: 100%;
            padding: 10px;
            background: #444;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
        }

        .form-section form textarea {
            height: 100px;
            resize: none;
        }

        .form-section form button {
            width: 100%;
            padding: 10px;
            background: #ffc107;
            border: none;
            border-radius: 5px;
            color: #333;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        .form-section form button:hover {
            background: #e0a800;
        }

        .form-section .input-group i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #ccc;
            font-size: 20px;
            transition: color 0.3s;
        }

        .form-section .input-group i:hover {
            color: #fff;
        }

        .contact-info nav {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .contact-info nav a {
            color: #ffc107;
            text-decoration: none;
            margin: 0 10px;
            position: relative;
            display: inline-block;
            transition: color 0.3s;
            padding-bottom: 5px;
        }

        .contact-info nav a.active,
        .contact-info nav a:hover {
            color: #e0a800;
        }

        .contact-info nav a.active::after,
        .contact-info nav a:hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background: #e0a800;
            bottom: 0;
            left: 0;
        }

        .dynamic-content {
            margin-top: 20px;
            margin-left: 10px;
        }

        .contact-info .social-links {
            margin-top: 15px;
        }

        .contact-info .social-links a {
            display: inline-block;
            margin-right: 10px;
            font-size: 24px;
            color: #ffc107;
            transition: color 0.3s;
        }

        .contact-info .social-links a:hover {
            color: #e0a800;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .form-section,
            .contact-info {
                margin: 10px 0;
                flex-basis: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-section">
            <h2>Welcome to asdsa!</h2>
            @error('email')
            <div class="text-danger">{{ $message }} !!</div>
            @enderror
            <form method="POST" action="/login">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" class="input" placeholder="Email" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="input" id="password" placeholder="Password" required>
                    <i class="bx bx-show" id="togglePassword"></i>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="contact-info">
            <nav>
                <a href="#" onclick="showContent('productInfo', this)" class="active">Product Information</a> |
                <a href="#" onclick="showContent('productHelp', this)">Product Help</a>
            </nav>
            <div id="dynamic-content" class="dynamic-content">
                <p>Explore our wide range of products, featuring high-quality materials and the latest designs.</p>
                <p>For further assistance, contact our product specialists at +33 608 98 77 55.</p>
            </div>
        </div>
    </div>
    <script>
        function showContent(type, element) {
            const content = document.getElementById('dynamic-content');
            const navLinks = document.querySelectorAll('.contact-info nav a');
            
            // Remove active class from all links
            navLinks.forEach(link => link.classList.remove('active'));
            
            // Add active class to the clicked link
            element.classList.add('active');
    
            if (type === 'productInfo') {
                content.innerHTML = `
                    <p>Explore our wide range of products, featuring high-quality materials and the latest designs.</p>
                    <p>For further assistance, contact our product specialists at +33 608 98 77 55.</p>
                `;
            } else if (type === 'productHelp') {
                content.innerHTML = `
                    <p>Need help with your purchase? Our team is available to assist with installation, setup, and more.</p>
                    <p>Contact our support team at +33 608 98 77 56 for expert guidance.</p>
                `;
            }
        }

        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bx-lock');
            this.classList.toggle('bx-lock-alt');
        });
    </script>
</body>

</html>
