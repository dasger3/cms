@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Добавить фильм') }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.pages.store') }}" method="POST">
                        @csrf
                       @include('admin.pages._form')
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
