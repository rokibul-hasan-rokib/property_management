<!DOCTYPE html>
<html>
<head>
    <title>New Bill Notification</title>
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
    </ul>
</body>
</html>
