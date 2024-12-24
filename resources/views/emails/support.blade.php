<!DOCTYPE html>
<html>
<head>
    <title>رسالة دعم</title>
</head>
<body>
    <h2>رسالة من: {{ $details['name'] }}</h2>
    <p><strong>البريد الإلكتروني:</strong> {{ $details['email'] }}</p>
    <p><strong>الرسالة:</strong></p>
    <p>{{ $details['message'] }}</p>
</body>
</html>
