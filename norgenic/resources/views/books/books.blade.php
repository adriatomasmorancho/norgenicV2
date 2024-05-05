@extends('layout.app')

@section('title')
<title>bookstore/<?php echo  app()->getLocale(); ?>/books</title>
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
<div class="p-2">
    <h1>{{ __('books') }}</h1>
    <a class="btn btn-primary" href="{{ route('books.create', ['locale' => app()->getLocale()]) }}">{{ __('create') }}</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('title') }}</th>
                <th>{{ __('author') }}</th>
                <th>{{ __('action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $key => $book)
            <tr>
                <td>{{ $book['book_id'] }}</td>
                <td>{{ $book['title'] }}</td>
                <td>{{ $book['author'] }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('books.edit', ['id' => $book->book_id, 'locale' => app()->getLocale()]) }}">{{ __('edit') }}</a>
                    <a class="btn btn-danger" href="{{ route('books.remove', ['id' => $book->book_id, 'locale' => app()->getLocale()]) }}">{{ __('remove') }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection