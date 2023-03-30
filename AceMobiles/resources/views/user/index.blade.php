@extends('layouts.front')

@section('title')
    My orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4>My Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            

                            </div> 
                            </div> 
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Arrival Date</th>
                                        <th>Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)

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
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
