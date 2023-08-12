<!DOCTYPE html>
<html>
<head>
    <title>Webhook Sender</title>
    <script>
        window.onload = function() {
            // Data to send to the webhook
            var dataToSend = {
                'message': 'hello'
            };

            // URL of the local webhook receiver
            var webhookUrl = 'http://localhost/web_hook_demo/web_hook.php';

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Set up the request
            xhr.open('POST', webhookUrl, true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            // Send the data
            xhr.send(JSON.stringify(dataToSend));

            // Handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    console.log('Webhook sent with response:', response);
                }
            };
        };
    </script>
</head>
<body>
    <h1>Webhook Sender</h1>
    <p>Data will be sent to the webhook when this page loads.</p>
</body>
</html>
