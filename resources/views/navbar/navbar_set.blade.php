@foreach ($navbar as $name => $uri)
    @if(is_array($uri))
        @if(count($uri))
            {{-- 次級選單 --}}
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ (Auth::check())?str_replace('%user%',Auth::user()->getNickname(),$name):$name }}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @foreach ($uri as $subName => $subUri)
                        {{-- 子項目--}}
                        @include('navbar.navbar_submenu', ['name' => $subName, 'items' => $subUri])
                    @endforeach
                </ul>
            </li>
        @endif
    @else
        {{-- 一般項目 --}}
        @include('navbar.navbar_item', ['uri' => $uri, 'name' => $name])
    @endif
@endforeach
