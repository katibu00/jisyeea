<!-- resources/views/collections/membersPdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members PDF</title>
    <!-- Include any styling you want for the PDF -->
</head>
<body>

    <h1 style="text-align: center; font-size: 20px; font-weight: bold;">
        Jigawa State Youth and Empowerment Agency
    </h1>

    <h4>Members in Collection: {{ $collection->title }}</h4>

    <table border="1" cellspacing="0" cellpadding="10" style="width: 100%; bottom: 10px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Picture</th>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>LGA of Origin</th>
                <th>Area of Study</th>
                <th>YEEA Number</th>
                <th>Ward</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img @if($user->picture == null) src="default.png" @else src="uploads/{{ $user->picture }}" @endif height="50" width="50" alt="User Image"></td>
                    <td>{{ $user->preRegistration->full_name ?? 'N/A' }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->preRegistration->lga_origin ?? 'N/A' }}</td>
                    <td>{{ $user->preRegistration->area_of_study ?? 'N/A' }}</td>
                    <td>{{ $user->preRegistration->yeea_number ?? 'N/A' }}</td>
                    <td>{{ $user->preRegistration->ward ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: center; position: fixed; bottom: 20px; width: 100%;">
        Printed by <a href="https://yeaa.gov.ng" style="text-decoration: none;">https://yeaa.gov.ng</a> @ {{ now() }}
    </div>
</body>
</html>
