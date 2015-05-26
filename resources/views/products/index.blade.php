@extends('app')

@section('content')
<div class="container">
	<h1>List products</h1>
    <a href="{{route('products.create')}}">Insert</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td><a href="{{route('products.destroy', $product->id)}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection

