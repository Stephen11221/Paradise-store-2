@extends('weblayout.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Shopping Cart</h2>

    @if($cartItems->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td><img src="{{ asset($item->options->image) }}" width="50" alt="Product Image"></td>
                        <td>{{ $item->name }}</td>
                        <td>Kshs {{ number_format($item->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->qty }}" min="1" class="form-control" style="width: 60px; display: inline-block;">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </form>
                        </td>
                        <td>Kshs {{ number_format($item->subtotal, 2) }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $item->rowId) }}" class="btn btn-sm btn-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Total: Kshs {{ number_format($total, 2) }}</h4>
        <a href="#" class="btn btn-primary">Proceed to Checkout</a>
    @else
        <p>Your cart is empty.</p>
        <a href="{{ url('/product') }}" class="btn btn-secondary">Continue Shopping</a>
    @endif
</div>
@endsection
