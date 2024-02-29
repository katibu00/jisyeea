<!-- Similar structure as before, adjust fields as needed -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>

<h1 style="text-align: center; font-size: 20px; font-weight: bold;">
    Jigawa State Youth and Empowerment Agency
</h1>
<h2 style="text-align: center; font-size: 15px; font-weight: bold;">{{ $program->name }}</h2>

<table border="1" cellspacing="0" cellpadding="10" style="width: 100%; bottom: 10px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Full Name</th>
        {{-- <th>Email</th> --}}
        <th>Phone Number</th>
        <th>NIN</th>
        <th>LGA</th>
        <th>Ward</th>
        <th>Qualification</th>
        <th>Course</th>
        <th>Constituency</th>
    </tr>
    </thead>
    <tbody>
    @foreach($applicants as $key => $applicant)

    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $applicant->user->name }}</td>
        {{-- <td>{{ $applicant->user->email }}</td> --}}
        <td>{{ $applicant->user->phone }}</td>
        <td>{{ optional($applicant->user->preRegistration)->nin }}</td>
        <td>{{ optional($applicant->user->preRegistration)->lga_origin }}</td>
        <td>{{ optional($applicant->user->preRegistration)->ward }}</td>
        <td>{{ ucwords(str_replace('-', ' ', optional($applicant->user->preRegistration)->highest_education)) }}</td>
        <td>{{ optional($applicant->user->preRegistration)->area_of_study }}</td>
        @php
            $response = App\Models\UserResponse::where('user_id',$applicant->user->id)->where('question_id',12)->first();
        @endphp
        <td>{{ optional($response)->response }}</td>
    </tr>
    @endforeach
    </tbody>
</table>

<div style="text-align: center; position: fixed; bottom: 20px; width: 100%;">
    Printed by <a href="https://yeaa.gov.ng" style="text-decoration: none;">https://yeaa.gov.ng</a> @ {{ now() }}
</div>
</body>
</html>
