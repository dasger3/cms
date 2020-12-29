@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit category') }}</div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category) }}" method="POST">
                         @csrf
                        {{ method_field('PUT') }}
                       @include('category._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
