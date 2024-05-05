@extends('layout.app')

@section('title')
<title>bookstore/<?php echo  app()->getLocale(); ?>/genericError</title>
@endsection

@section('content')
    <div class="col-md-12 text-center mt-3">
        <h1 class="text-danger">{{ __('genericError') }}</h1>
        <p class="text-danger">
        {{ __('messageGenericError') }}
        </p>
        <a href="{{ route('bookstore') }}">
        <button class="btn btn-primary">{{ __('backHome') }}</button>
        </a>
    </div>
@endsection