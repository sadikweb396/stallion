<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        /* Add some basic styles */
        body { font-family: Arial, sans-serif; }
        .header { background-color: #f4f4f4; padding: 20px; text-align: center; }
        .content { margin: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Owner Registration</h1>
    </div>
    <div class="content">
        <p>Hi {{ $data['name'] }},</p>
        <p>Your email id - {{ $data['email'] }} And Your default password - {{ $data['password'] }}</p>
        <p> "If you would like to change your password, please click the link below."</p>
        <p><a href="{{$data['baseurl']}}/change-password">Password Change</a></p>
    </div>
</body>
</html>
 