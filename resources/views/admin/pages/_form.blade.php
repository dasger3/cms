<div class="form-group">
   <input type="text" class="form-control" name="title" value="{{$page->title ?? ''}}" placeholder="Название">
</div>
<div class="form-group">
   <input type="text" class="form-control" name="path" value="{{$page->path ?? ''}}" placeholder="Путь">
</div>
<div class="form-group">
   <input type="text" class="form-control" name="main_content" value="{{$page->main_content ?? ''}}" placeholder="О фильме">
</div>
<div class="form-group">
   <input type="text" class="form-control" name="director" value="{{$page->director ?? ''}}" placeholder="Режисер">
</div>
<div class="form-group">
   <input type="integer" class="form-control" name="categorry_id" value="{{$page->categorry_id ?? ''}}" placeholder="Категория">
</div>
<div class="form-group">
    <select name="categories[]" multiple="" class="form-control">
        @include('admin.pages._categories')
    </select>
</div>
<hr>

<button type="submit" class="btn btn-primary">Сохранить</button>
