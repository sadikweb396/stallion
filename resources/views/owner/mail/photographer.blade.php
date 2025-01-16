<!DOCTYPE html>
<html>
<head>
    <title>Photographer</title>
    <style>
        /* Add some basic styles */
        body { font-family: Arial, sans-serif; }
        .header { background-color: #f4f4f4; padding: 20px; text-align: center; }
        .content { margin: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Provide Photographer For me</h1>
    </div>
    <div class="content">
        <h3>User Details</h3>
        <p>Name  {{ $data['name'] }}</p>
        <p>Email Id {{ $data['email'] }} </p>
        <p>Phone Number {{ $data['phone'] }}</p>
       
    </div>
    <div class="header">
        <h1>Stallion Details</h1>
    </div>
    <div class="content">
        <h3>Stallion Details</h3>
        <p>Stallion Name  {{ $data['stallionName'] }}</p>
        <p>Stallion Register Number {{ $data['stallionregistration'] }} </p>   
    </div>
</body>
</html>
 