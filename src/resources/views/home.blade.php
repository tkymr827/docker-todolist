@extends('layouts.base')
@section("title","ログイン認証")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">ログイン</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    ログインしました。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection