<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    @include('shared.header')
</head>
<body>

    @include('shared.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>My Orders</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->product_price }}</td>
                                <td>{{ $order->product_quantity }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->order_status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
</body>
</html>