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
    <h2 style="text-align: center; font-size: 15px; font-weight: bold;">{{ $collection->title }}</h2>

    @foreach ($membersByLGA as $lga => $membersInLGA)
        <h4 style="text-align: center; font-size: 16px;">
            {{ $lga }} LGA
        </h4>

        <table border="1" cellspacing="0" cellpadding="10" style="width: 100%; bottom: 10px;">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>LGA</th>
                    <th>Account Number</th>
                    <th>Bank Name</th>
                    <th>Account Name</th>
                    <th>BVN</th>
                    <th>NIN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($membersInLGA as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $member['name'] ?? 'N/A' }}</td>
                        <td>{{ $member['phone'] ?? 'N/A' }}</td>
                        <td>{{ $member['email'] ?? 'N/A' }}</td>
                        <td>{{ $member['pre_registration']['lga_origin'] ?? 'N/A' }}</td>
                        <td>{{ isset($member['account_details']['account_number']) ? $member['account_details']['account_number'] : 'N/A' }}
                        </td>
                        <td>{{ isset($member['account_details']['bank']) ? $member['account_details']['bank'] : 'N/A' }}
                        </td>
                        <td>{{ isset($member['account_details']['account_name']) ? $member['account_details']['account_name'] : 'N/A' }}
                        </td>
                        <td>{{ isset($member['account_details']['bvn']) ? $member['account_details']['bvn'] : 'N/A' }}
                        </td>
                        <td>{{ isset($member['account_details']['nin']) ? $member['account_details']['nin'] : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach


    <div style="text-align: center; position: fixed; bottom: 20px; width: 100%;">
        Printed by <a href="https://yeaa.gov.ng" style="text-decoration: none;">https://yeaa.gov.ng</a> @
        {{ now() }}
    </div>
</body>

</html>
