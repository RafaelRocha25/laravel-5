@extends('app')

@section('content')
<h1>List Products</h1>
<ul>
    @foreach($products as $product)
        <li>{{ $product->name }} - {{ $product->price }}</li>
    @endforeach
</ul>

@endsection