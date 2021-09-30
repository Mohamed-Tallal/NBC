<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div style="height: 70px ; width: 70px;">
            <img class="app-sidebar__user-avatar w-100"
                 src="{{asset('uploads/users/'.auth()->user()->image)}}" alt="Admin Image">
        </div>
        <div style="margin-left: 5px">
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation">NBC Admin</p>
        </div>
    </div>
    <ul class="app-menu" style="margin-top: -10px;">
        <li><a class="app-menu__item {{is_Active('')}}" href="{{route('dashboard.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item {{is_Active('user')}}" href="{{route('user.index')}}"><i class="app-menu__icon fa fa-user-o"></i><span class="app-menu__label">User</span></a></li>
        <li><a class="app-menu__item {{is_Active('product')}}" href="{{route('product.index')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Our Project</span></a></li>
        <li><a class="app-menu__item {{is_Active('service')}}" href="{{route('service.index')}}"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Our services</span></a></li>
        <li><a class="app-menu__item {{is_Active('client')}}" href="{{route('client.index')}}"><i class="app-menu__icon fa fa-cart-plus"></i><span class="app-menu__label">Clint Offer</span>
                @if($offers > 0 )
                <span class="badge badge-danger p-1 badgeItem">{{$offers}}</span>
                @endif
            </a></li>
        <li><a class="app-menu__item {{is_Active('testimonial')}}" href="{{route('testimonial.index')}}"><i class="app-menu__icon fa fa fa-microphone"></i><span class="app-menu__label">Testimonial</span></a></li>
        <li><a class="app-menu__item {{is_Active('contact')}}" href="{{route('contact.index')}}">
                <i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Contact Us</span>
                @if($contactUs > 0)
                <span class="badge badge-danger p-1 badgeItem">{{$contactUs}}</span>
                @endif
            </a>
        </li>
    </ul>
</aside>
