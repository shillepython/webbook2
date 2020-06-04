@extends('layouts.app')

@section('title', 'Все книжки')

@section('content')

    <div class="container">
        @include('book.admin.posts.inc.result_messages')
        <div class="row justify-content-center mb-3 mt-3">
            <div class="col-md-12 mb-5">
                <a href="{{ route('Book.book.index') }}" class="btn btn-primary mb-2">Back</a>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('image/default-book.png') }}" class="card-img-top mb-3" alt="...">

                            <div class="card-body">
                                <h2 class="card-text">Price: {{ $book->price }}$</h2>
                                <p class="card-text"><b>Genre:</b> {{ $book->category->title }}</p>
                                <p class="card-text"><b>Date:</b> {{ $book->created_at->format('d.m.Y') }}</p>
                                <p class="card-text">{{ $book->excerpt }}</p>
                                @if(Auth::user()->isAdmin())
                                <a class="btn btn-primary" href="{{ route('book.admin.posts.edit', $book->id) }}">EDIT</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <h4 class="card-header pt-3"><a href="{{ route('Book.book.show', $book->id) }}">{{ $book->title }}</a></h4>
                            <div class="card-body">
                                <h4>Content the book:</h4><p class="card-text">{{ $book->content_html }}</p>
                            </div>
                            <h4 class="card-footer">
                                <p class="card-text text-right">{{ $book->user->name }}</p>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            {{--Создание коментария--}}
            @if(Auth::user())
            <div class="col-md-12">
                <div class="card mb-5">
                    <form action="{{ route('Book.book.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="post_id" value="{{ $book->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" name="comments" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send to book!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            {{--Коментарии--}}
            <div class="col-md-12">
                @foreach($comments as $comment)
                <div class="card mb-4">

                    <div class="card-header">
                        <b>Name user:</b> {{ $comment->user_id }}
                    </div>
                    <div class="card-body">
                        {{ $comment->comments }}
                    </div>
                    <div class="card-footer">
                        <div class="row">
                        <div class="col-md-11">
                            <b>Data comment:</b> {{ $comment->created_at->format('d.m.Y') }}
                        </div>
                        @if(Auth::user()->isAdmin())
                        <div class="col-md-1">
                            <form action="{{ route('Book.book.destroy', $comment->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-primary">Dell</button>
                            </form>
                        </div>
                         @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
