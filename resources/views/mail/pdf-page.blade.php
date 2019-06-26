<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css')}}/stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
    <style>
        #confirm-order{margin-top: 20px}
    </style>
</head>
<body>
<div class="container" id="confirm-order">
    <div class="card">
        <center>
            <div class="card-header">
                <h2>Order information</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <h4>Product code: {{$order->code}}</h4>
                </div>
                <div class="row">
                    <h4>Product name: {{$order->product_name}}</h4>
                </div>
                <div class="row">
                    <h4>Customer name: {{$order->name}}</h4>
                </div>
                <div class="row">
                    <h4>Mobile 1: {{$order->mobile1}}</h4>
                </div>
            </div>
            <div class="card-footer">
                <h3>Thank you for your order</h3>
            </div>
        </center>
    </div>
</div>
</body>
</html>