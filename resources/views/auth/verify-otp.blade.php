<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <form action="{{ route('verify.otp') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="otp" placeholder="OTP" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
