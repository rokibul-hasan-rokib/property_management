<!DOCTYPE html>
<html>
<head>
    <title>New Bill Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h1>New Bill Notification</h1>
    <p>Hello {{ $billDetails['user']->name }},</p>
    <p>You have a new bill for the month of {{ $billDetails['bill_month'] }}:</p>
    <ul>
        <li>Bill Name: {{ $billDetails['bill_name'] }}</li>
        <li>House: {{ $billDetails['bill_house'] }}</li>
        <li>Electricity Bill: {{ $billDetails['bill_electrity'] }}</li>
        <li>Status: {{ $billDetails['status'] == 1 ? 'Active' : 'Inactive' }}</li>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </ul>
</body>
</html>
