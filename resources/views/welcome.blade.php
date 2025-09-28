<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Sarabun', sans-serif;
            }

            body {
                background: linear-gradient(135deg, #f8f5f5 0%, #f0e6e6 100%);
                color: #333;
                line-height: 1.6;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                padding: 20px;
            }

            .header {
                background: linear-gradient(135deg, #8B0000, #A9A9A9);
                color: white;
                padding: 15px 5%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 4px 12px rgba(139, 0, 0, 0.3);
                border-radius: 10px;
                margin-bottom: 30px;
            }

            nav {
                display: flex;
                gap: 15px;
            }

            nav a {
                color: white;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 20px;
                font-weight: 500;
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.1);
            }

            nav a:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateY(-2px);
            }

            .container {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }

            .content {
                background: white;
                border-radius: 20px;
                box-shadow: 0 20px 50px rgba(139, 0, 0, 0.15);
                padding: 40px;
                text-align: center;
                max-width: 800px;
                width: 100%;
                position: relative;
                overflow: hidden;
                border: 1px solid #e8d8d8;
            }

            .content::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background: linear-gradient(90deg, #8B0000, #A9A9A9);
            }

            h1 {
                font-size: 32px;
                color: #8B0000;
                margin-bottom: 20px;
            }

            p {
                color: #5a5a5a;
                font-size: 18px;
                margin-bottom: 30px;
                line-height: 1.8;
            }

            .info-box {
                background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
                border-left: 4px solid #8B0000;
                padding: 20px;
                border-radius: 0 8px 8px 0;
                text-align: left;
                margin: 30px 0;
                box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
            }

            .info-box h3 {
                color: #8B0000;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .steps {
                text-align: left;
                margin: 30px 0;
            }

            .steps h3 {
                color: #8B0000;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .step {
                display: flex;
                gap: 15px;
                margin-bottom: 20px;
                align-items: flex-start;
            }

            .step-number {
                background: linear-gradient(135deg, #8B0000, #A0522D);
                color: white;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                flex-shrink: 0;
                box-shadow: 0 2px 5px rgba(139, 0, 0, 0.3);
            }

            .btn {
                background: linear-gradient(135deg, #8B0000, #A0522D);
                color: white;
                border: none;
                padding: 16px 40px;
                border-radius: 8px;
                font-size: 18px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
                box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
                margin: 10px;
            }

            .btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 15px rgba(139, 0, 0, 0.4);
            }

            .btn-login {
                background: linear-gradient(135deg, #6B8E23, #556B2F);
            }

            .btn-register {
                background: linear-gradient(135deg, #20B2AA, #008B8B);
            }

            .btn-deploy {
                background: linear-gradient(135deg, #FF8C00, #FF4500);
            }

            ul {
                list-style: none;
                padding: 0;
                margin: 20px 0;
            }

            li {
                margin: 15px 0;
                padding: 15px;
                background: #f8f0f0;
                border-radius: 8px;
                border-left: 4px solid #8B0000;
                transition: all 0.3s ease;
            }

            li:hover {
                transform: translateX(10px);
                box-shadow: 0 5px 15px rgba(139, 0, 0, 0.2);
            }

            a {
                color: #8B0000;
                text-decoration: none;
                font-weight: 600;
            }

            a:hover {
                text-decoration: underline;
            }

            .footer {
                text-align: center;
                padding: 20px;
                color: #7f8c8d;
                font-size: 0.9em;
                margin-top: 30px;
                border-top: 1px solid #e0d0d0;
                background: #f5f5f5;
                border-radius: 10px;
            }

            @media (max-width: 768px) {
                .header {
                    flex-direction: column;
                    gap: 15px;
                }
                
                nav {
                    flex-wrap: wrap;
                    justify-content: center;
                }
                
                .content {
                    padding: 20px;
                }
                
                .btn {
                    display: block;
                    margin: 10px auto;
                    width: 80%;
                }
            }
        </style>
    </head>
    <body>
        <header class="header">
            <div class="logo-text">
                <h2>{{ config('app.name', 'Laravel') }}</h2>
            </div>
            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-login">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-login">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-register">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <div class="container">
            <main class="content">
                <h1>Let's get started</h1>
                <p>Laravel has an incredibly rich ecosystem. We suggest starting with the following.</p>
                
                <div class="info-box">
                    <h3>
                        <span>📚</span> Learning Resources
                    </h3>
                    <ul>
                        <li>
                            <span class="step-number">1</span>
                            Read the 
                            <a href="https://laravel.com/docs" target="_blank">
                                Documentation
                            </a>
                        </li>
                        <li>
                            <span class="step-number">2</span>
                            Watch video tutorials at 
                            <a href="https://laracasts.com" target="_blank">
                                Laracasts
                            </a>
                        </li>
                        <li>
                            <span class="step-number">3</span>
                            Explore the 
                            <a href="https://laravel.com/docs/packages" target="_blank">
                                Package Ecosystem
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="steps">
                    <h3>
                        <span>🚀</span> Getting Started
                    </h3>
                    <ul>
                        <li>
                            <span class="step-number">1</span>
                            Create your first route in <code>routes/web.php</code>
                        </li>
                        <li>
                            <span class="step-number">2</span>
                            Build your first controller using <code>php artisan make:controller</code>
                        </li>
                        <li>
                            <span class="step-number">3</span>
                            Design your database using <code>php artisan make:migration</code>
                        </li>
                    </ul>
                </div>

                <a href="https://cloud.laravel.com" target="_blank" class="btn btn-deploy">
                    Deploy now
                </a>
            </main>
        </div>

        <div class="footer">
            <p>© 2025 {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        </div>
    </body>
</html>