<!DOCTYPE html>
<html>
<head>
    <title>New Bill Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>New Bill Notification</h1>
    <p>Hello {{ $bill['user']->name }},</p>
    <p>You have a new bill for the month of {{ $bill['bill_month'] }} has been paid</p>
    <ul>
        <li>Bill Name: {{ $bill['bill_name'] }}</li>
        <li>House: {{ $bill['bill_house'] }}</li>
        <li>Status: {{ \App\Models\Property::STATUS_LIST[$bill->status] ?? '' }}</li>
    </ul>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
