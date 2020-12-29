@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
           <nav class="navbar">
               <?php foreach($pages as $page){ 
                if($page->alias_of != NULL) continue;?>
                    <div class="card" style="width: 30rem;">
                      <div class="card-body">
                        <h5 class="card-title">{{$page->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Режисер: {{$page->director}}</h6>
                        <hr>
                        <p class="card-subtitle mb-2 text-muted">Создание статьи: {{$page->created_at}}</p>
                        <p class="card-subtitle mb-2 text-muted">Обновнение статьи: {{$page->updated_at}}</p>
                        <a href="{{ url("$page->path") }}"><button type="button" class="btn btn-dark">Посмотреть</button></a>
                      </div>
                    </div>
                <?php }?>
            </nav>
        </div>
    </div>
</div>
@endsection
