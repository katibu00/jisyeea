<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ID Card</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* background-color: #E6E6E6; */
        }

        .id-card {
            width: 300px;
            background-color: #fff;
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .header img {
            max-width: 80px;
            vertical-align: middle;
        }

        .organization-name {
            font-size: 18px;
            margin: 10px 0;
        }

        .website-url {
            color: #fff;
            text-decoration: none;
            font-size: 12px;
            display: block;
            margin-top: 5px;
        }

        .user-details {
            text-align: center;
            padding: 20px;
        }

        .user-details img {
            max-width: 120px;
            border-radius: 50%;
            margin: 10px 0;
        }

        .user-name {
            font-size: 20px;
            font-weight: bold;
            margin: 5px 0;
        }

        .user-details p {
            font-size: 14px;
            margin: 5px 0;
        }

        .qr-code {
            text-align: center;
            padding: 20px;
        }

        .qr-code img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <div class="header">
            <img src="{{ public_path('/images/logo.jpeg') }}" alt="Organization Logo">
            <h2 class="organization-name">YEEA - Jigawa State</h2>
            <a class="website-url" href="http://www.yeea.jg.gov.ng" target="_blank">www.yeea.jg.gov.ng</a>
        </div>
        <div class="user-details">
            <img @if(auth()->user()->picture == null) src="default.png" @else src="uploads/{{ auth()->user()->picture }}" @endif  alt="User Image">
            <h3 class="user-name">{{ auth()->user()->name }}</h3>
            <p>{{ $preRegistration->yeea_number }}</p>
            <!-- Add more user details here -->
        </div>
        <div class="qr-code">
            <img src="qrcode.png" alt="QR Code">
        </div>
    </div>
</body>
</html>
