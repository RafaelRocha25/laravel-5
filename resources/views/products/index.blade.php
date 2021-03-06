@extends('app')

@section('content')
<div class="container">
	<h1>List products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-default">New Product</a>
    <br />
    <br />
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ str_limit($product->description, $limit = 100, $end = '...') }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{route('products.images', $product->id)}}">Images</a> |
                    <a href="{{route('products.edit', $product->id)}}">Edit</a> |
                    <a href="{{route('products.destroy', $product->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->render() !!}
</div>
@endsection

