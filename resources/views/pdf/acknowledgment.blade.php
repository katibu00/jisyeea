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
        <h3>Application Acknowledgment</h3>
        <p><strong>Application Number:</strong> {{ $application->application_number }}</p>
        <p><strong>Name:</strong> {{ $application->full_name }}</p>
        <p><strong>Date of Birth:</strong> {{ $application->date_of_birth }}</p>
        <p><strong>Gender:</strong> {{ $application->gender }}</p>
        <p><strong>Contact Number:</strong> {{ $application->contact_number }}</p>
        <p><strong>Address:</strong> {{ $application->address }}</p>
        <p><strong>Email:</strong> {{ $application->email }}</p>
        <p><strong>LGA Origin:</strong> {{ $application->lga_origin }}</p>
        <p><strong>Ward:</strong> {{ $application->ward }}</p>
        <p><strong>Highest Education:</strong> {{ $application->highest_education }}</p>
        <p><strong>Category:</strong> {{ $application->category }}</p>
        <p><strong>Programs:</strong> {{ $application->programs }}</p>
        <p><strong>Status:</strong> {{ $application->status }}</p>
    </div>    </div>

    <div class="applicant-photo">
        <img src="{{ public_path('path/to/your/applicant_photo.jpg') }}" alt="Applicant Photo">
    </div>

    <div class="footer">
        <p>Thank you for your application!</p>
    </div>
</body>
</html>
