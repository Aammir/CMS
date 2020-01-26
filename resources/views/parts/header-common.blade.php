<header class="header">
    <div class="header__content row">
        <div class="header__logo">
            <a class="logo" href="{{url('/')}}">
                @if(!empty($siteInfo->logo))
                <img src="{{  url('/assets/img/'.$siteInfo->logo)  }}" alt="{{ $siteInfo->site_name }}"/>
                 @else  @if(!empty($siteInfo->site_name))@endif  @endif
            </a>
        </div> <!-- end header__logo -->

        <ul class="header__social">
                @if(!empty($sm->facebook))<li> <a href="{{ $sm->facebook }}"  title="Facebook" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i> </a> </li>@endif
                @if(!empty($sm->twitter))<li> <a href="{{ $sm->twitter }}"  title="Twitter" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i> </a> </li>@endif
                @if(!empty($sm->gplus))<li> <a href="{{ $sm->gplus }}"  title="Google Plus" target="_blank"> <i class="fa fa-google-plus" aria-hidden="true"></i> </a> </li>@endif
                @if(!empty($sm->linkedin))<li> <a href="{{ $sm->linkedin }}"  title="Linkedin" target="_blank"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> </li>@endif
                @if(!empty($sm->instagram))<li> <a href="{{ $sm->instagram }}"  title="Instagram" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i> </a> </li>@endif
                @if(!empty($sm->pinterest))<li> <a href="{{ $sm->pinterest }}"  title="Pinterest" target="_blank"> <i class="fa fa-pinterest" aria-hidden="true"></i> </a> </li>@endif
                @if(!empty($sm->youtube))<li> <a href="{{ $sm->youtube }}"  title="Youtube" target="_blank"> <i class="fa fa-youtube" aria-hidden="true"></i> </a> </li>@endif
                @if(!empty($sm->whatsapp))<li> <a href="{{ $sm->whatsapp }}"  title="Whatsapp" target="_blank"> <i class="fa fa-mobile-phone" aria-hidden="true"></i> </a> </li>@endif
        </ul> <!-- end header__social -->

        <a class="header__search-trigger" href="#0"></a>

        <div class="header__search">

 <form role="search" method="get" class="header__search-form" action="{{url('/search')}}">
    <label>
        <span class="hide-content">Search for:</span>
        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="q" title="Search for:">
    </label>
    <input type="submit" class="search-submit" value="Search">
</form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div>  <!-- end header__search -->


        <a class="header__toggle-menu" href="#0" title="Menu"><sp                                                                an>Menu</span></a>

        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Site Navigation</h2>

            <ul class="header__nav">
                @foreach($nav as $link)
                <li><a href="{{  strtolower(url('/page/'.$link->slug))  }}" title="{{ucfirst($link->title)}}">{{ucfirst($link->title)}}</a></li>
                @endforeach
                <li class="has-children">
                    <a href="#0" title="">Categories</a>
                    <ul class="sub-menu">
                        @foreach($categories as $category)
                        <li><a href="{{strtolower(url('/categories/'.$category->slug))}}">{{ucfirst($category->name)}}</a></li>
                        @endforeach
                    </ul>
                </li>

            </ul> <!-- end header__nav -->
            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
        </nav> <!-- end header__nav-wrap -->
    </div> <!-- header-content -->
</header> <!-- header -->
