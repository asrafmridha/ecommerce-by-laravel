<!DOCTYPE html>
<html>
<head>
    <title>Order Placed</title>
</head>
<body>
   <strong>Order Id:        </strong>
   <strong>Order Date:      </strong>
   <strong>Total Amount:    </strong>
   <hr>
   <strong>Name:    {{ $order['c_name'] }}      </strong>
   <strong>Phone:   {{ $order['c_phone'] }}      </strong>
   <strong>Address: {{ $order['c_address'] }}   </strong>
   
    <p>Thank you</p>
</body>
</html>