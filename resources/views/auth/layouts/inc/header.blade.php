<!-- Navbar -->
<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <!--<a class="navbar-brand" href="#pablo"> Dashboard </a>-->
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                    <li class="dropdown nav-item">&nbsp;</li>
                    <li class="dropdown nav-item"><a class="btn btn-default btn-link" style="border:none;font-weight:bold;">Quick Start</a></li>

                    <li class="dropdown nav-item"><a href="{{url('/admin/add-post')}}" title="Add Post" class="btn btn-info btn-fill pull-right"> <i class="fa fa-paste"></i> Add Post </a> </li>
                        <li class="dropdown nav-item"><a href="{{url('/admin/add-page')}}" title="Add Page" class="btn btn-info btn-fill pull-right"> <i class="fa fa-plus"></i> Add Page</a> </li>
                    <li class="dropdown nav-item">&nbsp;</li>
                    <li class="dropdown nav-item">&nbsp;</li>
<!--                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-palette"></i>
                        <span class="d-lg-none">Dashboard</span>
                    </a>
                </li>-->

<!--                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nc-icon nc-zoom-split"></i>
                        <span class="d-lg-block">&nbsp;Search</span>
                    </a>
                </li>-->
            </ul>
            <ul class="navbar-nav ml-auto">
<!--                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <span class="no-icon">Account</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">Dropdown</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>-->
<!--                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <span class="no-icon">Log out</span>
                    </a>
                </li>-->
                {{-- <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-email-83"></i>
                        <span class="notification">5</span>
                        <span class="d-lg-none">Unread Contact Messages</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="#">Unread Contact Messages</a>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-notes"></i>
                        <span class="notification">8</span>
                        <span class="d-lg-none">New Subscribers</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="#">New Subscribers</a>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-chat-round"></i>
                        <span class="notification">15</span>
                        <span class="d-lg-none">Unread Comments</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="#">Unread Comments</a>
                    </ul>
                </li> --}}

<li class="nav-item dropdown">
	<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	 <i class="nc-icon nc-single-02"></i>&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
	</a>

	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="{{ route('logout') }}"
		   onclick="event.preventDefault();
						 document.getElementById('logout-form').submit();">
			{{ __('Logout') }}
		</a>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
	</div>
</li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
