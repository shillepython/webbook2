@extends('layouts.app')

@section('title', 'Все книжки')

@section('content')

<div class="container">
    @include('book.admin.posts.inc.result_messages')
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="row">

                @foreach($paginator as $post)
                    <div class="col-md-6">
                        @php /* @var \App\Models\BookPost $post */ @endphp
                        <div class="card mb-3" style="min-height: 400px;">
                            <img src="{{ asset('image/default-book.png') }}" style="height: 150px;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('Book.book.show', $post->slug) }}">{{ $post->title }}</a></h5>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <h5 class="card-text text-center">Price: {{ $post->price }}$</h5>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="card-text"><small class="text-muted">Genre: {{ $post->category->title }}</small></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card-text"><small class="text-muted text-right">{{ $post->created_at->format('d.m.Y') }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="col-md-4">
            <form action="{{ route('Book.book.index') }}" method="get">
                @include('book.posts.inc.item_filter')
            </form>
        </div>
    </div>
    @if($paginator->total() > $paginator->count())
        <div class="row justify-content-center mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ $paginator->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
