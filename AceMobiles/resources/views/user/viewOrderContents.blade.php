<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ordered Items</title>
    @include('shared.header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
</head>
<body>
@include('shared.navbar')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Items inside order</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        @foreach ($order_contents as $bsk)
                            <tr>
                                <td><img src="{{ URL::asset('/images/' . $bsk['productImage']) }}" alt="" style="max-height: 200px;max-width:200px"></td>
                                <td>{{ $bsk['productBrand'] }}</td>
                                <td>{{ $bsk['productName'] }}</td>
                                <td>{{ $bsk['productDescription'] }}</td>
                                <td>{{ $bsk['quantity'] }}</td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('shared.footer')
        
</body>
</html>