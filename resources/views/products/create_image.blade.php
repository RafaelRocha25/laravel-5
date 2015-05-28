@extends('app')

@section('content')
<div class="container">
	<h1>Upload Image</h1>
	<h3>Product: {{ $product->name }}</h3>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => ['products.images.store', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Upload Image', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    <div class="row">
        <a href="{{route('products.images', $product->id)}}">Back</a>
    </div>

</div>
@endsection