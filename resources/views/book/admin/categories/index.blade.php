@extends('layouts.app')

@section('title', 'Все книжки')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-12">
                @include('book.admin.posts.inc.result_messages')
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('book.admin.categories.create') }}" class="btn btn-primary">Add category</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Category</td>
                                    <td>Parent</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @php /* @var \App\Models\BookCategory $item */ @endphp
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('book.admin.categories.edit', $item->id) }}">{{ $item->title }}</a>
                                </td>
                                <td @if(in_array($item->parent_id, [0,1])) style="color: #ccc" @endif>
                                    {{ $item->parentTitle }}
                                </td>
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
