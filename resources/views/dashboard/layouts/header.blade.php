<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="#">NBC</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!--Notification Menu-->
        <li class="dropdown">
            <a class="app-nav__item position-relative" href="#" data-toggle="dropdown" aria-label="Show notifications">
                <i class="fa fa-bell-o fa-lg"></i>
                @if($offers->count() > 0 )
                    <span class="badge badge-danger position-absolute" style="left: 25px;top: 12px;border-radius: 10px;">{{$offers->count()}}</span>
                @endif
            </a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">You have {{$offers->count()}} new notifications.</li>
                <div class="app-notification__content">
                    @foreach($offers as $offer)
                        <li><a class="app-notification__item" href="{{route('client.show',$offer->id)}}">
                                <span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i>
                                        <i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">{{$offer->type}}</p>
                                    <p class="app-notification__meta">{{$offer->created_at->diffForHumans()}}</p>
                                </div></a></li>
                    @endforeach
                </div>
                @if($offers->count() != 0 )
                    <li class="app-notification__footer"><a href="{{route('client.index')}}">See all notifications.</a></li>
                @endif
            </ul>
        </li>

        <!-- Language Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <i class="fa fa-flag fa-lg" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a class="dropdown-item border-bottom"  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach

            </ul>
        </li>

        <li class="dropdown">
            <a class="app-nav__item position-relative" href="#" data-toggle="dropdown" aria-label="Show notifications">
                <i class="fa fa-envelope fa-lg"></i>
                    @if($contactUs->count() > 0)
                        <span class="badge badge-danger position-absolute"
                          style="left: 25px;top: 12px;border-radius: 10px;">{{$contactUs->count()}}</span>
                    @endif
            </a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">You have {{$contactUs->count()}} new Message.</li>
                <div class="app-notification__content">
                    @foreach($contactUs as $contact)
                        <li><a class="app-notification__item" href="{{route('contact.show',$contact->id)}}"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">{{$contact->name}}</p>
                                    <p class="app-notification__message">
                                        {{Str::limit($contact->message , 100) }}
                                    </p>
                                    <p class="app-notification__meta">{{$contact->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    </div>
                @if($contactUs->count() != 0)
                <li class="app-notification__footer"><a href="{{route('contact.index')}}">See all notifications.</a></li>
                @endif
            </ul>
        </li>

        <!-- User Logout-->
        <form method="post" action="{{route('post.logout')}}">
            @csrf
            <li><button class="app-nav__item"  type="submit" style="background-color: transparent ; border: none"><i class="fa fa-sign-out fa-lg"></i> </button></li>

        </form>
    </ul>
</header>
