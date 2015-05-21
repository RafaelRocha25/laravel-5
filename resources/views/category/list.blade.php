@extends('app')

@section('content')
<h1>List Categories</h1>
<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ul>

@endsection