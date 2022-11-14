<!DOCTYPE html>
<html>

<head>
    <title>Leads-pdf</title>
    <style>
        table tr th {
            background-color: #04AA6D;
            color: white;
            border: 1px solid #ddd;
            padding: 2px;
            width: 10px;
        }

        table tr td {
            border: 1px solid #ddd;
            padding: 2px;
            width: 10px;
        }
    </style>
</head>

<body>
    <h3>Generated Leads PDF</h3>
    <table style="width: 100%;">
        <tr>
            <th>Sr No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Country Code</th>
            <th>Mobile</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Subject</th>
        </tr>
        @foreach ($leads as $key => $lead)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{ $lead->name }}</td>
            <td>{{ $lead->email }}</td>
            <td>{{ $lead->country_code }}</td>
            <td>{{ $lead->mobile }}</td>
            <td>{{ $lead->country }}</td>
            <td>{{ $lead->state }}</td>
            <td>{{ $lead->city }}</td>
            <td>{{ $lead->subject }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
