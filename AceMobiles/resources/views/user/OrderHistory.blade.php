<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Orders</title>
    @include('shared.header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
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
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order Date</th>
                            <th>Arrival Date</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order['orderDate']->format('d/ m/ Y') }}</td>
                                <td>{{ $order['arrivalDate']->format('d/ m/ Y') }}</td>
                                <td>{{ $order['status'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('shared.footer')
</body>
</html>