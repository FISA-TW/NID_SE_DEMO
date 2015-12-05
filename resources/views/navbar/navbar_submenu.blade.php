@if(is_array($items))
    <li class="dropdown-submenu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ (Auth::check())?str_replace('%user%',Auth::user()->getNickname(),$name):$name }}</a>
        <ul class="dropdown-menu" role="menu">
            @foreach ($items as $itemName => $itemUri)
                {{-- 次級選單 --}}
                @include('navbar.navbar_submenu', ['name'=>$itemName, 'items' => $itemUri])
            @endforeach
        </ul>
    </li>
@else
    {{-- 一般項目 --}}
    @include('navbar.navbar_item', ['uri' => $items, 'name' => $name])
@endif
