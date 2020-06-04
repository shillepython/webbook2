@extends('layouts.app')

@section('title', 'Все книжки')

@section('content')
    <div class="container">
{{--        @if(session('success'))--}}
{{--            <div class="row justify-content-center mb-3">--}}
{{--                <div class="col-md-12">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="row justify-content-center mb-3">
            <div class="col-md-12">
                @include('book.admin.posts.inc.result_messages')
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('book.admin.posts.create') }}" class="btn btn-primary">Add book</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Author</td>
                                <td>Category/Genre</td>
                                <td>Title</td>
                                <td>Publication date</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $post)
                                @php /* @var \App\Models\BookPost $post */ @endphp
                                <tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>
                                        <a href="{{ route('book.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                                    </td>
                                    <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <div class="row justify-content-center mb-3">
                <div class="col-md-8">
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
