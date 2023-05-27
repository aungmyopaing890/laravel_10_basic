
<li class="nav-item">
    <a class="nav-link  {{ Request::url() == $link ? 'active' : '' }}" href="{{ $link }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-secondary text-center me-2 d-flex align-items-center justify-content-center">
            <i class="{{$class}} mr-2 fa-fw"></i>
        </div>
        <span class="nav-link-text ms-1">{{$name}}</span>
    </a>
</li>
