<!DOCTYPE html>
<html>
<head>
    <title>New Bill Notification</title>
</head>
<body>
    <h1>New Bill Notification</h1>
    <p>Hello {{ $bill['user']->name }},</p>
    <p>You have a new bill for the month of {{ $bill['bill_month'] }} has been paid</p>
    <ul>
        <li>Bill Name: {{ $bill['bill_name'] }}</li>
        <li>House: {{ $bill['bill_house'] }}</li>
        <li>Status: {{ \App\Models\Property::STATUS_LIST[$property->status] ?? '' }}</li>
    </ul>
</body>
</html>
