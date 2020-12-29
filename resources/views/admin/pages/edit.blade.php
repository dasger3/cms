@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Редактировать') }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                         @csrf
                        {{ method_field('PUT') }}
                       @include('admin.pages._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
