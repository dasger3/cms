@foreach($categories as $categoryItem)
    <option value="{{$categoryItem->id ?? ''}}"
        @isset($page->id)

            @foreach ($page->categories as $categoryPage)
                @if ($categoryItem->id == $categoryPage -> id)
                selected =""
                @endif
            @endforeach

        @endisset
        >

        {{$delimiter ?? ''}} {{$categoryItem->title ?? ''}}
    </option>

     @isset($categoryItem->children)
         @include('admin.pages._categories', [
             'categories' => $categoryItem->children,
             'delimiter' => ' - '.$delimiter
         ])
     @endisset
@endforeach
