@extends('app')

@section('content')
<div class="container">
	<h1>List categories</h1>
    <a href="/categories/create">Insert</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td><a href="{{route('categories.destroy', $category->id)}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection

