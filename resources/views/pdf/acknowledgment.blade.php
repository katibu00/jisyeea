<!DOCTYPE html>
<html>
<head>
    <title>Application Acknowledgment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            max-width: 150px;
        }

        .applicant-info {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 20px;
        }

        .applicant-info p {
            margin: 5px 0;
        }

        .applicant-photo {
            text-align: center;
            margin-bottom: 20px;
        }

        .applicant-photo img {
            max-width: 150px;
        }

        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('/images/logo.jpeg') }}" alt="Agency Logo" width="100">
        <h2>Jigawa State Youth Empowerment Agency</h2>
        <p>Block A, New Secretariat Complex,3 Arms Zone, Takur Dutse, Jigawa State-Nigeria.</p>
        <p>Phone: +234 123 456 789</p>
    </div>

    <div class="applicant-info">
        <h3>Pre-Registration Acknowledgment</h3>
        <p><strong>Application Number:</strong> {{ $preRegistration->application_number }}</p>
        <p><strong>Name:</strong> {{ $preRegistration->full_name }}</p>
        <p><strong>Date of Birth:</strong> {{ $preRegistration->date_of_birth }}</p>
        <p><strong>Gender:</strong> {{ $preRegistration->gender }}</p>
        <p><strong>Contact Number:</strong> {{ $preRegistration->contact_number }}</p>
        <p><strong>Address:</strong> {{ $preRegistration->address }}</p>
        <p><strong>Email:</strong> {{ $preRegistration->email }}</p>
        <p><strong>LGA Origin:</strong> {{ $preRegistration->lga_origin }}</p>
        <p><strong>Ward:</strong> {{ $preRegistration->ward }}</p>
        <p><strong>Highest Education:</strong> {{ $preRegistration->highest_education }}</p>
        <p><strong>Category:</strong> {{ $preRegistration->category }}</p>
        <p><strong>Programs:</strong> {{ $preRegistration->programs }}</p>
        <p><strong>Status:</strong> {{ $preRegistration->status }}</p>
    </div>    </div>

    <div class="applicant-photo">
        <img src="{{ public_path('path/to/your/applicant_photo.jpg') }}" alt="Applicant Photo">
    </div>

    <div class="footer">
        <p>Thank you for your Pre-Registration!</p>
    </div>
</body>
</html>
