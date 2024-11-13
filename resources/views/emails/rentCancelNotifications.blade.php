<!DOCTYPE html>
<html>
<head>
    <title>Rent Cancellation Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h1>Rent Cancellation Notice</h1>
    <p>Hello {{ $rentDetails['user']->name }},</p>
    <p>We regret to inform you that your rent for the month of {{ $rentDetails['bill_month'] }} has been canceled.</p>
    <ul>
        <li>Bill Name: {{ $rentDetails['bill_name'] }}</li>
        <li>House: {{ $rentDetails['bill_house'] }}</li>
        <li>Electricity Bill: {{ $rentDetails['bill_electrity'] }}</li>
        <li>Status: Cancelled</li>
    </ul>
    <p>If you have any questions, feel free to contact us.</p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>a
</body>
</html>
