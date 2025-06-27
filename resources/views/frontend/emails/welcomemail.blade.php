<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome mail</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f8f8; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background-color: #007bff; color: white; padding: 20px;">
            <h2 style="margin: 0;">Welcome to ProWebShop!</h2>
        </div>
        <div style="padding: 20px;">
            <p>Hi <strong>{{ $user->name }}</strong>,</p>
            <p>Thank you for registering at <strong>ProWebShop</strong>.</p>
            <p>Your registered email is: <strong>{{ $user->email }}</strong></p>
            <p style="margin-top: 30px;">Regards,<br>The ProWebShop Team</p>
        </div>
        <div style="background-color: #f1f1f1; color: #555; padding: 15px; text-align: center;">
            <small>&copy; {{ date('Y') }} ProWebShop. All rights reserved.</small>
        </div>
    </div>
</body>
</html>
