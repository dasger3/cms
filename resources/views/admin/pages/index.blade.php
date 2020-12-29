@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Фильмы') }}</div>
                <div class="card-body">
                    <?php
                        $query = mysqli_query($connect, "SELECT * FROM pages ORDER BY id");
                        if(str_contains(url()->current(), "sorted")){
                            $query = mysqli_query($connect, "SELECT * FROM pages ORDER BY title");
                        }
                        if(str_contains(url()->current(), "defl")){
                            $query = mysqli_query($connect, "SELECT * FROM pages ORDER BY id");
                        }
                        if(str_contains(url()->current(), "created")){
                            $query = mysqli_query($connect, "SELECT * FROM pages ORDER BY created_at");
                        }
                        if(str_contains(url()->current(), "updated")){
                            $query = mysqli_query($connect, "SELECT * FROM pages ORDER BY updated_at");
                        }
                        while($rowe = mysqli_fetch_assoc($query)) {
                            $page=App\Models\Page::find($rowe['id']);
                            if ($page->alias_of != 0 ) continue;
                    ?>
                    <div class="card" style="margin-top:20px">
                        <div class="card-body">
                            <h5 class="card-title">{{$page->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Режисер {{$page->director}}</h6>
                            <p class="card-text">{{$page->main_content}}</p>
                            <hr>
                            <p class="card-subtitle mb-2 text-muted">Создание статьи: {{$page->created_at}}</p>
                            <p class="card-subtitle mb-2 text-muted">Обновление статьи: {{$page->updated_at}}</p>
                            <div class="but_menu">
                                @can('edit-pages')
                                    <a href="{{ route('admin.pages.edit', $page->id) }}"><button type="button" class="btn btn-warning float-left">Редактировать</button></a>
                                @endcan
                                @can('delete-pages')
                                    <form action="{{ route('admin.pages.destroy' , $page) }}" method="POST" class="float-left">
                                        @csrf {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                @endcan
                                <a href="{{ url("$page->path") }}"><button type="button" class="btn btn-info">Посмотреть</button></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="my_menu">
                <a href="{{ route('admin.pages.create')}}"><button type="button" class="btn btn-success btn-lg">Добавить фильм</button></a>
                <a href="{{url('admin/pages/defl')}}" style="margin-top:50px"><button type="submit" class="btn btn-outline-dark">По умолчанию</button></a>
                <a href="{{url('admin/pages/sorted')}}" style="margin-top:10px"><button type="submit" class="btn btn-outline-dark">По названию</button></a>
                <a href="{{url('admin/pages/created')}}" style="margin-top:10px"><button type="submit" class="btn btn-outline-dark">По дате создания</button></a>
                <a href="{{url('admin/pages/updated')}}" style="margin-top:10px"><button type="submit" class="btn btn-outline-dark">По дате обновления</button></a>
            
            </div>
        </div>
    </div>
</div>
@endsection
