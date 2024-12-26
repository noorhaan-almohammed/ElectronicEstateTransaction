<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homes</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo.svg') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    @vite(['resources/css/index.css', 'resources/css/buttons.css','resources/js/login.js'])
</head>

<body class="antialiased">

    <nav>
        <div class="nav-container">
            <div class="links">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo">
                    </a>
                </div>
                <ul class="nav-items">
                    <li class="nav-item">
                        <a href="{{ url('/') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/transaction') }}">الخدمات</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}">من نحن</a>
                    </li>
                </ul>
            </div>

            <div class="sec-item">
                @auth
                <a class="btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('تسجيل خروج') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
                <a href="{{ route('login') }}" class="btn-primary">
                    <i class='bx bx-user'></i>
                    تسجيل دخول
                </a>
                <a href="{{ route('register') }}" class="btn-primary">
                    <i class='bx bx-user'></i>
                    مستخدم جديد
                </a>
            @endauth
            </div>
        </div>
        </div>
    </nav>

    @yield('content')
    <!-- Footer -->
    <footer>
        <div class="logo">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo">
        </div>
        <div class="contact-info">
            <div class="item">
                <h5>اتصل بنا</h5>
                <span>001122</span>
            </div>
            <div class="item">
                <h5>تابعنا على</h5>
                <span>
                    <i class='bx bxl-facebook-circle'></i>
                    <i class='bx bxl-twitter'></i>
                </span>
            </div>
        </div>
        <div class="copy-right">
            <p>2024 © All Rights Reserved For <span>Homes</span></p>
        </div>
    </footer>
