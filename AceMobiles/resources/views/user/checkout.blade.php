<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
  <title>Ace Mobiles | Checkout</title> 
  @include('shared.header')
</head>
<body>
@include('shared.navbar')

<div class="bg-light">
        <div class="p-lg-5 col-md-5 mx-auto">
            <div class="text-center">
            <h1>Checkout</h1>
          </div>
        </div>
</div>

<div class="container mt-2 p-3 pt-2">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic details</h6>
                        <hr>
                        <div class="row checkout form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your First Name"
                                    value="{{ Auth::user()->firstName }}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Last Name"
                                    value="{{ Auth::user()->surname }}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Your Email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address</label>
                                <input type="text" class="form-control"
                                    placeholder="Enter Your Address"value="{{ Auth::user()->address }}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Post Code</label>
                                <input type="text" class="form-control" placeholder="Enter Your Post Code"
                                    value="{{ Auth::user()->postcode }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6> Order Summary</h6>
                        <hr>
                        <table class="table">
                            <tbody>
                                <?php
                                $decoded = json_decode(json_encode($basketInfo), true);
                                $totalPrice = 0;
                                ?>

                                @foreach ($decoded as $item)
                                    <?php $totalPrice += $item['totalPrice'] * $item['quantity'];?>
                                    <tr>
                                        <td>{{ $item['productName'] }}</td>
                                        <td>{{ $item['productPrice'] }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Subtotal</h6>
                            </div>
                            <div class="col-md-4">
                                <h6>£{{ $totalPrice }}</h6>
                            </div>
                        </div>
                        <a href="{{ asset('placeOrder') }}"><button class="btn btn-primary" type="button">Place order</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div style="height:20px;" class="bg-white">

    </div>
    @include('shared.footer')
</body>
</html>


