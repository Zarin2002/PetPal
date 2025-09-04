@extends('layouts.app')

@section('content')

{{-- Flash messages --}}
@if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        {{ session('error') }}
    </div>
@endif

<div style="display:flex;">

  <!-- Sidebar -->
  <div style="width:220px; background:#2a5bd7; color:white; height:100vh; padding:20px;">
    <h2>Categories</h2>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Pet Food</a>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Toys</a>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Grooming</a>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Accessories</a>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Medicine</a>
  </div>

  <!-- Content -->
  <div style="flex:1; padding:20px;">
    <h1>Pet Shop</h1>
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(200px,1fr)); gap:20px;">

      {{-- Product 1 --}}
      <div style="border:1px solid #ddd; border-radius:8px; padding:15px; text-align:center;">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="100" height="100">
        <h3>Dog Food</h3>
        <p>$20</p>
        <form action="{{ route('cart.add', 1) }}" method="POST">
            @csrf
            <button type="submit" style="background:#2a5bd7; color:white; border:none; padding:8px 12px; border-radius:5px; cursor:pointer;">
                Add to Cart
            </button>
        </form>
      </div>

      {{-- Product 2 --}}
      <div style="border:1px solid #ddd; border-radius:8px; padding:15px; text-align:center;">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="100" height="100">
        <h3>Chew Toy</h3>
        <p>$10</p>
        <form action="{{ route('cart.add', 2) }}" method="POST">
            @csrf
            <button type="submit" style="background:#2a5bd7; color:white; border:none; padding:8px 12px; border-radius:5px; cursor:pointer;">
                Add to Cart
            </button>
        </form>
      </div>

    </div>

    {{-- Cart Summary --}}
    <div style="margin-top:40px; border-top:1px solid #ddd; padding-top:20px;">
        <h2>Your Cart</h2>

        @php
            $cart = session('cart', []);
        @endphp

        @if(empty($cart))
            <p>Your cart is empty.</p>
        @else
            <table style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border:1px solid #ddd; padding:8px;">Product</th>
                        <th style="border:1px solid #ddd; padding:8px;">Price</th>
                        <th style="border:1px solid #ddd; padding:8px;">Quantity</th>
                        <th style="border:1px solid #ddd; padding:8px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td style="border:1px solid #ddd; padding:8px;">{{ $item['name'] }}</td>
                            <td style="border:1px solid #ddd; padding:8px;">${{ $item['price'] }}</td>
                            <td style="border:1px solid #ddd; padding:8px;">{{ $item['quantity'] }}</td>
                            <td style="border:1px solid #ddd; padding:8px;">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; border-radius:3px; cursor:pointer;">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('cart.checkout') }}" method="POST" style="margin-top:20px;">
                @csrf
                <button type="submit" style="background:green; color:white; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">
                    Place Order
                </button>
            </form>
        @endif
    </div>

  </div>

</div>

@endsection








