
    @foreach($items as $menu_item)
    <li class="nav-item">
      <a class="nav-link @if(Request::url() == url($menu_item->link())) active @else text-white @endif" href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
    </li>
    @endforeach