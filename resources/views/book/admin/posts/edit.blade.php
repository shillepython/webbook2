@extends('layouts.app')

@section('title', 'Все книжки')

@section('content')
    @php /* @var \App\Models\BookPost $item */ @endphp

    <div class="container">

    @include('book.admin.posts.inc.result_messages')

    @if($item->exists)
        <form action="{{ route('book.admin.posts.update', $item->id) }}" method="post">
            @method('PATCH')
    @else
        <form action="{{ route('book.admin.posts.store') }}" method="post">
    @endif

        @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('book.admin.posts.inc.post_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('book.admin.posts.inc.post_edit_add_col')
                </div>
            </div>
        </form>
        @if($item->exists)
            <div class="row justify-content-center mb-3">
                <div class="col-md-8">
                    <form action="{{ route('book.admin.posts.destroy', $item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                    <div class="card card-block">
                        <div class="card-body ml-auto">
                            <button type="submit" class="btn btn-link">Удалить</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        @endif
    </div>
@endsection
