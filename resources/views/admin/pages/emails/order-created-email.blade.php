<!DOCTYPE html>
<html>
<head>
    <title>New Order Confirmation</title>
</head>
<body>
    <h2>Subject: New Order Confirmation</h2>
    <p>Dear customer,</p>
    <p>We are delighted to confirm that your new order has been successfully created with tecflix. Below are the details of your order:</p>

    <p><strong>Order Details:</strong></p>
    <ul>
        <li><strong>Order ID:</strong> {{ $order->id }}</li>
        <li><strong>Customer Name:</strong> {{ $order->user->name }}</li>
        <li><strong>Customer Email:</strong> {{ $order->user->email  }}</li>
        <li><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</li>
        <!-- Add more order details as needed -->
    </ul>

    <p><strong>IMPORTANT NOTES:</strong></p>
    <ol>
        <li>This email serves as a confirmation of your new order with us.</li>
        <li>If you have any questions about your order or need further assistance, please do not hesitate to contact us.</li>
        <!-- Add more relevant notes if necessary -->
    </ol>

    <p>If you have any questions or need assistance, please feel free to contact us via email: <a href="mailto:info@tecflix.com">info@tecflix.com</a> or WhatsApp: +57 0000000000.</p>

    <p>Thank you for choosing tecflix. We look forward to serving you!</p>

    <p>Best regards,<br>
    Lina Marcela Mendoza Gaviria<br>
    Director ID: 5872<br>
    tecflix</p>

    <p><em>This is a system-generated email. Please do not reply.</em></p>
</body>
</html>
