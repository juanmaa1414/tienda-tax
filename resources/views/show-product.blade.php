@extends('layout')

@push('head')
<script src="{{ asset('js/purchase.js')}}"></script>
@endpush
  
@section('content')
    <script>
        const sessionData = { givenEmail: 'testemail@test.co' };
    </script>

    <div class="product" data-product-id="{{ $product->id }}">
        <div class="columns">
            <div class="column has-text-centered">
                <img src="{{ $product->img }}" width="220" />
            </div>
            <div class="column">
                <h3 class="title is-3">{{ $product->name }}</h3>
                <p><em>¡Últimos disponibles!</em></p>
                <br>
                <p>
                    <span class="title is-4">${{ $product->unit_price }}</span> &nbsp;hasta 6 cuotas sin interés
                </p>
                <br><br>
                <button id="addToCart" class="button is-info is-rounded">Encargar al carrito</button>
            </div>
        </div>
    </div>
    
    <div id="notificationArea">
        
    </div>
@endsection