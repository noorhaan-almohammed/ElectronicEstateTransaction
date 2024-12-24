@extends('layouts.nav')
@section('content')
<section class="transaction-hero">
    <div class="info">
        <h1>مرحبا بكم في منصة تسيير معاملات العقارات للمغتربين</h1>
        <p>نحن هنا لتسهيل وتبسيط جميع معاملاتكم القانونية الخاصة بالعقارات، أينما كنتم حول العالم.</p>
    </div>
</section>

<section class="start-transaction">
    <h2>ابدأ معاملتك والدفع الإلكتروني</h2>
    <div class="body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="form">
            <form id="transaction-form" action="{{ route('storeTransaction') }}" method="POST">
                @csrf

                <select name="type" id="type" required>
                    <option value="" selected>نوع المعاملة</option>
                    <option value="buy">شراء</option>
                    <option value="rent">إيجار</option>
                </select>
                @error('type')
                <div class="error">{{ $message }}</div>
                @enderror

                <textarea placeholder="تفاصيل العقار" rows="4" name="description" required></textarea>
                @error('description')
                <div class="error">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="الوثائق المطلوبة" name="required_documents" required>
                @error('required_documents')
                <div class="error">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="التكلفة التقديرية" name="cost" required>
                @error('cost')
                <div class="error">{{ $message }}</div>
                @enderror

                <select name="city_id" id="city" required>
                    <option value="" selected>البلد / المدينة</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                <div class="error">{{ $message }}</div>
                @enderror

                <select name="contact_method_id" id="contact_methods" required>
                    <option value="" selected>وسائل الاتصال</option>
                    @foreach ($contactMethods as $method)
                        <option value="{{ $method->id }}">{{ $method->method }}</option>
                    @endforeach
                </select>
                @error('contact_method_id')
                <div class="error">{{ $message }}</div>
                @enderror

                <h3>الدفع الإلكتروني</h3>
                <div class="item">
                    <label>المبلغ المطلوب (بالدولار):</label>
                    <input type="number" id="amount" name="amount" value="3" readonly>
                </div>

                <div class="item">
                    <label>بيانات البطاقة:</label>
                    <div id="card-element" style="width: 100%;"></div>
                </div>

                <div id="card-errors" role="alert"></div>

                <div class="btn-container">
                    <button type="submit" class="btn-primary">إرسال المعاملة والدفع</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('pk_test_51ONXM0DCnvSZulvvRJCUdzqajOBsSoeP1o25GSQctKDvEYf7dgTPJn6XlIGu4aLqjU8mKByPfK4UcCL673wCDwpX00bVUfXybD'); 
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('transaction-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const { token, error } = await stripe.createToken(cardElement);

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
        } else {
            const formData = new FormData(form);
            formData.append('stripeToken', token.id);

            fetch('{{ route('storeTransaction') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('تم إرسال المعاملة والدفع بنجاح!');
                    window.location.href = '{{ route('home') }}';
                } else {
                    alert('فشلت العملية: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء معالجة الطلب.');
            });
        }
    });
</script>
@endsection
