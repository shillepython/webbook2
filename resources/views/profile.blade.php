@extends('layouts.app')

@section('title', 'Все книжки')

@section('content')

    <div class="container">
        @include('book.admin.posts.inc.result_messages')
        <div class="row justify-content-center mb-3 mt-3">
            <div class="col-md-12 mb-5">
                <a href="{{ route('welcome') }}" class="btn btn-primary mb-2">Home</a>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <h4 class="card-header pt-3" style="margin-bottom: 0;">Profile</h4>
                            <div class="card-body" style="font-size: 22px;">
                                <div class="row">
                                    <div class="col-md-4 offset-3">
                                        <span>Name: {{ \Auth::user()->name }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Email: {{ \Auth::user()->email }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 offset-3">
                                        <span>Role: <?php echo Auth::user()->isAdmin() ? "Admin" : "User" ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Account Creation Date: {{ \Auth::user()->created_at->format('d.m.y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
