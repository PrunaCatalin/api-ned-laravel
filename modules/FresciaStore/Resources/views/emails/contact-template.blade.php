<?php
/*
 * webdirect | contact-template.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/16/2023 9:36 AM
*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>Message from Contact Form</title>
</head>
<body>
<h1>You have a new message from the contact form</h1>
<p><strong>Name:</strong> {{ $data['fullname'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Message:</strong> {{ $data['message'] }}</p>
</body>
</html>

