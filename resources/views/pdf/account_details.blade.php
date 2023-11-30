<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $collection->title }} Account Details</title>
</head>
<body>

    <h1 style="text-align: center; font-size: 20px; font-weight: bold;">
        Jigawa State Youth and Empowerment Agency
    </h1>

    <h2 style="text-align: center; font-size: 16px;">
        {{ $collection->title }} Account Details
    </h2>

    <table border="1" cellspacing="0" cellpadding="10" style="width: 100%;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Account Number</th>
                <th>Bank Name</th>
                <th>Account Holder Name</th>
                <th>BVN</th>
                <!-- Add more fields as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ optional($member->accountDetails)->account_number ?? 'N/A' }}</td>
                    <td>{{ optional($member->accountDetails)->bank ?? 'N/A' }}</td>
                    <td>{{ optional($member->accountDetails)->account_name ?? 'N/A' }}</td>
                    <td>{{ optional($member->accountDetails)->bvn ?? 'N/A' }}</td>
                    <!-- Add more fields as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: center; position: fixed; bottom: 20px; width: 100%;">
        Printed by <a href="https://yeaa.gov.ng" style="text-decoration: none;">https://yeaa.gov.ng</a> @ {{ now() }}
    </div>
</body>
</html>
