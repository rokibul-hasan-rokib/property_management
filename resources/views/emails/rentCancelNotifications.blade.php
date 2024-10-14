<!DOCTYPE html>
<html>
<head>
    <title>Rent Cancellation Notification</title>
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
</body>
</html>
