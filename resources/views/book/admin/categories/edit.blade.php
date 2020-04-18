@extends('layouts.app')

@section('title', 'Все книжки')

@section('content')
    @php /* @var \App\Models\BookCategory $item */ @endphp
    <form action="{{ route('book.admin.categories.update', $item->id) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="container">
            @php
                /* @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
            @include('book.admin.categories.inc.result_messages')
            <div class="row justify-content-center mb-3">
                <div class="col-md-8">
                    @include('book.admin.categories.inc.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('book.admin.categories.inc.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
