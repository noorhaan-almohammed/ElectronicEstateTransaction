@extends('layouts.nav')
@section('content')

<section class="transaction-hero aboutUs">
    <div class="info">
        <h1>
            تعرف علينا
        </h1>
        <p>نسعى أن نكون الخيار الأول للمغتربين في إتمام المعاملات العقارية بسهولة وأمان</p>
    </div>
</section>
<!-- aboutUs info-->
<section class="aboutUs-info">
    <h2>من نحن</h2>
    <div class="body">
        <div class="message">
            <p>
                <span>رسالتنا:</span>
                نهدف إلى تقديم دعم شامل وموثوق للمغتربين في تيسير وإتمام معاملات العقارات بكل سهولة وشفافية من خلال
                فريق متخصص في المجال القانوني، نسعى لجعل عملية الشراء والبيع والإيجار أكثر بساطة وأمانًا، وتوفير
                خدمات استشارية عالية الجودة تلبي احتياجات عملائنا في أي مكان حول العالم. نلتزم بتقديم تجربة رقمية
                مميزة تتيح للمغتربين متابعة جميع خطوات معاملاتهم بكفاءة واطمئنان، مع التأكيد على حماية مصالحهم
                القانونية وتحقيق أفضل النتائج الممكنة.
            </p>
        </div>
        <div class="team">
            <h4>فريقنا</h4>
            <div class="team-cards">
                <div class="item">
                    <img src="{{ Vite::asset('resources/images/team-01.jpg') }}" alt="team">
                    <p>Full name</p>
                </div>

                <div class="item">
                    <img src="{{ Vite::asset('resources/images/team-02.jpg') }}" alt="team">
                    <p>Full name</p>
                </div>

                <div class="item">
                    <img src="{{ Vite::asset('resources/images/team-03.jpg') }}" alt="team">
                    <p>Full name</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="./assets/js/index.js"></script>

@endsection
