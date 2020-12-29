<div class="form-group">
   <input type="text" class="form-control" name="title" value="{{$category->title ?? ''}}" placeholder="Title">
</div>
<div class="form-group">
    <select name="parent_id" class="form-control">
        <option value="0">-- without parent --</option>
        @include('category._categories')
    </select>
</div>

<hr>

<button type="submit" class="btn btn-primary">Save</button>
