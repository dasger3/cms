
  
   @foreach($categories as $category)
    @if ($category->children->count())
        <li class="nav-item dropdown" style="margin-left:65px">
        <div>
          {{$category->title ?? ''}}
        </div>

        <div>
            @isset($category->children)
             @include('layouts._menu', ['categories' => $category->children, 'is_child' => ""])
     @endisset
        @else
          @isset($is_child)
              <a class="nav-link dropdown-item" style="margin-left:5px" href="{{ url("category/categor/$category->id") }}">-{{$category->title ?? ''}}</a>

              @foreach($pages as $film)
                @if($film->categorry_id == $category->id)
                  @if($film->alias_of != NULL)
                    <?php $newpage=App\Models\Page::find($film->alias_of); ?>
                    <a class="nav-link dropdown-item" style="margin-left:32px" href="{{ url("$film->path") }}">{{$newpage->title}}</a>
                  @else
                  <a class="nav-link dropdown-item" style="margin-left:32px" href="{{ url("$film->path") }}">{{$film->title}}</a>
                @endif
                @endif
              @endforeach
              <p>
              @continue

          @endisset

          </div>
      </li>

    @endif

@endforeach


