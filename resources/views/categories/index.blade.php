@extends('app')

@section('content')
<div class="container">
	<h1>List categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-default">New Category</a>
    <br />
    <br />
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
                <td>
                    <a href="{{route('categories.edit', $category->id)}}">Edit</a> |
                    <a href="{{route('categories.destroy', $category->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $categories->render() !!}

</div>
@endsection

