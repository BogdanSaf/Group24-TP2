@extends('layouts.front')

@section('title')
    My orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->firstname }}</div>
                                <label for="">Surname</label>
                                <div class="border p-2">{{ $orders->surname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label for="">Contact.No</label>
                                <div class="border p-2">{{ $orders->phoneNumber }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{ $orders->address1 }},
                                    {{ $orders->address2 }},
                                    {{ $orders->city }},
                                    {{ $orders->state }},
                                    {{ $orders->country }},
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2">{{ $orders->pincode}}</div>

                            </div> 
                            </div> 
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)

                                    <tr>
                                       <td>{{ $item->products->productName}}</td>
                                       <td>{{ $item->quantity}}</td>
                                       <td>{{ $item->price}}</td>
                                       <td>
                                        <img src="{{ asset('assets.uploads/products/'.$item->products->image)  }}" width=50px alt="Product image">
                                        
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h4>Grand Total: {{$orders->total_price}} </h4>
                            </div> 
                        
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
