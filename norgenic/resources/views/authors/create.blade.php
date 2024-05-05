@extends('layout.app')

@section('title')
<title>bookstore/<?php echo  app()->getLocale(); ?>/authors/create</title>
@endsection

@section('content')
@if(Session::has('message'))
<div class="row">
    <div class="col ml-3 mt-3 alert alert-success">
        <p>{{Session::get('message')}}</p>
    </div>
    <div class="col">
    </div>
    <div class="col">
    </div>
</div>
@endif
<h1 class="p-2">{{ __('newAuthor') }}</h1>
<form method="POST" action="{{ route('authors.store', ['locale' => app()->getLocale()]) }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
        </div>
        <div class="col-md-6">
            <label for="name">{{ __('name') }}</label>
            <input name="name" id="name" class="form-control @error('name') is-invalid @enderror" type="text">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary mt-3" type="submit">{{ __('sumbit') }}</button>
        </div>
        <div class="col">
        </div>
    </div>
</form>
@endsection