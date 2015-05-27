@extends('app')

@section('content')
<div class="container">
	<h1>Edit product: {{ $product->name }}</h1>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('featured', 'Featured:') !!}
            {!! Form::checkbox('featured', $product->featured, ($product->featured == 'on') ? true : false) !!}
        </div>

        <div class="form-group">
            {!! Form::label('recommend', 'Recomend:') !!}
            {!! Form::checkbox('recommend', $product->recommend, ($product->recommend == 'on') ? true : false) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save Category', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

</div>
@endsection
