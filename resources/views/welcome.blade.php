<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    @vite(['resources/css/index.css' , 'resources/css/buttons.css'])
</head>
<body class="antialiased">
    @if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
    @endif

    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif
    <!-- Navigation -->
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
                        <a href="{{ url('/contact') }}">تواصل معنا</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/about') }}">من نحن</a>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="info">
            <h1>
                دليلك الآمن والموثوق
                <span>
                    لمعاملاتك العقارية
                </span>
            </h1>
            <p>نساهم في الارتقاء بجودة الخدمات المقدمة، ورفع رضا العملاء</p>
            <button class="btn-primary">
                <a href="{{ route('createTransaction') }}" >
                ابدأ معاملتك</a></button>
        </div>
        <div class="slider">
            <img src="{{ Vite::asset('resources/images/hero.png') }}" alt="hero">
        </div>
    </section>

    <!-- services -->
    <section class="services">

        <hr>
        <h2>خدماتنا</h2>

        <div class="body">
            <div class="card-container">
                <div class="card">
                    <h3>مساعدة في إجراءات البيع والشراء</h3>
                    <p>نقدم خدمة متكاملة لمساعدتك في جميع مراحل بيع وشراء العقارات، بدءًا من التقييم وحتى التوقيع
                        النهائي
                        على العقود،
                        لضمان أن تجربتك تسير بسلاسة وراحة</p>
                </div>
                <div class="card">
                    <h3>خدمات التوثيق والتسجيل</h3>
                    <p>نقدم استشارات قانونية متخصصة
                        تساعدك في فهم حقوقك وواجباتك،
                        مما يضمن لك اتخاذ القرارات الصائبة
                        في معاملتك العقارية ويعزز ثقتك
                        في كل خطوة تخطوها</p>
                </div>
                <div class="card">
                    <h3>استشارات قانونية</h3>
                    <p>نقدم خدمات توثيق وتسجيل موثوقة
                        لضمان أن جميع معاملاتك العقارية
                        تتم بشكل قانوني وسلس،
                        مما يضمن حماية حقوقك ويساعدك
                        في تجنب أي نزاعات مستقبلية</p>
                </div>

            </div>

        </div>
        <hr>
    </section>

    <!-- Contact us -->
    <section class="Contact-Us">
        <div class="header">
            <h2>تواصل معنا</h2>
            <p>اتصل بنا اليوم واترك لنا مهمة مساعدتك في إتمام معاملاتك العقارية بسهولة وأمان</p>
        </div>
        <div class="form">
            <form action="{{ route('sendSupportMessage') }}" method="post">
                @csrf
                <input type="text" placeholder="الاسم الكامل" name="name" required>
                <input type="email" placeholder="البريد الالكتروني" name="email" required>
                <input type="text" placeholder="رقم الهاتف" name="phone">
                <textarea placeholder="الرسالة" rows="8" name="message" required></textarea>
                <button class="btn-primary" type="submit">ارسال الرسالة</button>
            </form>
            @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>



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

</body>
</html>
