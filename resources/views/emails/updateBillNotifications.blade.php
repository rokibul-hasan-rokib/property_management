<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bill Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: rgba(0, 0, 255, 0.3);
            /* Light blue background with 30% opacity */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .notification-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="notification-container">
        <h1>New Bill Notification</h1>
        <p>Hello {{ $bill['user']->name }},</p>
        <p>Your new bill for the month of {{ $bill['bill_month'] }} has been paid.</p>
        <ul class="list-unstyled">
            <li><strong>Bill Name:</strong> {{ $bill['bill_name'] }}</li>
            <li><strong>Status:</strong> {{ $billDetails['status'] == 1 ? 'Paid' : 'Pending' }}</li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
