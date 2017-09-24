@foreach($items as $key=>$item)
    <li@lm-attrs($item) @lm-endattrs>
        @if($item->link)
            <a@lm-attrs($item->link) @lm-endattrs href="{!! $item->url() !!}">
             <span class="nav-label">{!! $item->title !!}</span> @if($item->hasChildren())<span class="fa arrow"></span>@endif
            </a>
        @else
            {!! $item->title !!}
        @endif
        @if($item->hasChildren())
            <ul class="nav nav-second-level collapse">
                @include('admin::submenu-items', array('items' => $item->children()))
            </ul>
        @endif
    </li>
    @if($item->divider)
        <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
    @endif
@endforeach
