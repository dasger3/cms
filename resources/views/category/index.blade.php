@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div style="display:flex; flex-direction:column; align-items:center; width:100%;">
            <a href="{{ route('category.create')}}">
                <button type="button" class="btn btn-success btn-lg" style="margin-bottom:15px">
                    Добавить новую категорию
                </button>
            </a>
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>

                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->title ?? ''}}</td>
                                    <td class="text-right">

                                        <a href="{{ route('category.edit', $category) }}"><button type="button" class="btn btn-warning float-left">
                                            Edit
                                        </button></a>
                                        <form action="{{ route('category.destroy' , $category) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-dark">
                                                Delete
                                            </button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
