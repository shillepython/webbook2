@extends('layouts.app')

@section('title', 'Все книжки')

@section('content')
    @php /* @var \App\Models\BookCategory $item */ @endphp

    <form action="{{ route('book.admin.categories.store', $item->id) }}" method="post">
        @csrf
        <div class="container">
            @php
                /* @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif
            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif
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
