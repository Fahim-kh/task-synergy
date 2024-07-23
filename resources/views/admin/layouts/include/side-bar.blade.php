<aside class="app-sidebar">
	<div class="app-sidebar__user active">
        <div class="user-body">
            <span class="avatar avatar-lg brround text-center cover-image" data-image-src="@if(Auth::user()->user_image != ''){{ asset('admin/uploads/user_images') }}/{{ Auth::user()->user_image }} @else {{ asset('admin/assets') }}/no_image.png }} @endif" style="background: url(&quot;@if(Auth::user()->user_image !=''){{ asset('admin/uploads/user_images') }}/{{ Auth::user()->user_image }} @else {{ asset('admin/assets') }}/no_image.png @endif&quot;) center center; width:120px; height:120px"></span>
        </div>
        <div class="user-info">
            <a href="#" class="ml-2"><span class="text-dark app-sidebar__user-name font-weight-semibold">{{ Auth::user()->name }}</span><br>
                <span class="text-muted app-sidebar__user-name text-sm"> {{  Auth::user()->role->name  }}</span>
            </a>
        </div>
    </div>
    <ul class="side-menu" style="overflow: hidden;height: 300px;overflow-y: scroll;">
        @foreach(Auth::user()->getmodules() as $module)
            @if(sizeof($module->childs))
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <i class="{{ $module->icon }}"></i><span class="side-menu__label">{{ $module->name }}</span><i class="angle fas fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        @foreach($module->childs as $child)
                        <li>
                            <a href="@if($child->route != '#') {{ route( $child->route)}} @else {{$child->route}} @endif" class="slide-item">{{ $child->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a class="side-menu__item" href="@if($module->route != '#') {{ route( $module->route )}} @else {{ $module->route }} @endif"><i class="{{ $module->icon }}"></i><span class="side-menu__label" id="{{ str_replace(' ', '-', $module->name); }}">{{ $module->name}}</span></a>
                </li>
            @endif
        @endforeach
    </ul>
</aside>
