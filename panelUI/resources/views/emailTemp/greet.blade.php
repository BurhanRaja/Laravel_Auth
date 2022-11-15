<!DOCTYPE html>
<html>

<head>
    <title>Admin World</title>
</head>

<body>
    <h3>Hi, {{ $data['name'] }}, </h3>
    <p>Email: {{ $data['email'] }}</p>
    <p>Country_code: {{ $data['country_code'] }}</p>
    <p>Mobile: {{ $data['mobile'] }}</p>
    <p>Subject: {{ $data['subject'] }}</p>
    <p>Country: {{ $data['country'] }}</p>
    <p>State: {{ $data['state'] }}</p>
    <p>City: {{ $data['city'] }}</p>
</body>

</html>
