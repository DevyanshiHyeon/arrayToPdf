<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        /* Add your CSS styles here (optional) */
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .data {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">Invoice</div>
    <div class="data">Name: {{ $data['name'] }}</div>
    <div class="data">Email: {{ $data['email'] }}</div>
    <div class="data">Phone: {{ $data['phone'] }}</div>
    <div class="data">Address: {{ $data['address'] }}</div>
</body>
</html>
