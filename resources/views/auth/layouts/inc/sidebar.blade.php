<?php $bg=url('/assets/img/sidebar-4.jpg');?>
<div class="sidebar" style="background-image:url('<?=$bg?>');"  data-color="azure" data-image="{{ url('/assets/img/sidebar-4.jpg') }}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{url('/admin')}}" class="simple-text">
                Dashboard
            </a>
        </div>
        <ul class="nav">

            <li class="nav-item @if(Request::segment(1) == 'admin' && Request::segment(2) == '') active  @endif">
                <a class="nav-link" href="{{url('/admin')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) == 'users') active  @endif">
                <a class="nav-link" href="{{url('/admin/users')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) == 'posts' || Request::segment(2) == 'add-post' || Request::segment(2) == 'categories' || Request::segment(2) == 'tags') active  @endif">
                <a href="#{{url('/admin/posts')}}" class="collapsed nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Posts</p>
                </a>
                <div class="collapse" id="submenu1" aria-expanded="false">
                    <ul class="flex-column pl-2 nav">
                        <li class="nav-item"> <a class="nav-link py-0" href="{{url('/admin/posts')}}"> <i class="nc-icon nc-paper-2"></i> All Posts</a> </li>
                        <li class="nav-item"> <a class="nav-link py-0" href="{{url('/admin/add-post')}}"> <i class="nc-icon nc-simple-add"></i> Add Post</a> </li>
                        <li class="nav-item"> <a class="nav-link py-0" href="{{url('admin/categories')}}"> <i class="nc-icon nc-bullet-list-67"></i>  Post Categories</a> </li>
                        <li class="nav-item"> <a class="nav-link py-0" href="{{url('admin/tags')}}"> <i class="nc-icon nc-tag-content"></i>  Post Tags</a> </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @if(Request::segment(2) == 'pages' || Request::segment(2) == 'add-page') active  @endif">
                <a href="#{{url('/admin/pages')}}" class="collapsed nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Pages</p>
                </a>
                <div class="collapse" id="submenu2" aria-expanded="false">
                    <ul class="flex-column pl-2 nav">
                        <li class="nav-item"> <a class="nav-link py-0" href="{{url('/admin/pages')}}"> <i class="nc-icon nc-paper-2"></i> All Pages</a> </li>
                        <li class="nav-item"> <a class="nav-link py-0" href="{{url('/admin/add-page')}}"> <i class="nc-icon nc-simple-add"></i> Add Page</a> </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if(Request::segment(2) == 'contact-messages') active  @endif">
                <a class="nav-link" href="{{url('/admin/contact-messages')}}">
                    <i class="nc-icon nc-email-83"></i>
                    <p>Contact Messages</p>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) == 'comments') active  @endif">
                <a class="nav-link" href="{{url('/admin/comments')}}">
                    <i class="nc-icon nc-chat-round"></i>
                    <p>Comments</p>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) == 'subscribers') active  @endif">
                <a class="nav-link" href="{{url('/admin/subscribers')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Subscribers</p>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) == 'settings') active  @endif">
                <a class="nav-link" href="{{url('/admin/settings')}}">
                    <i class="nc-icon nc-settings-gear-64"></i>
                    <p>Site Settings</p>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) == 'sm') active  @endif">
                <a class="nav-link" href="{{  url('/admin/sm')}}">
                    <i class="fa fa-globe"></i>
                    <p>Social Media Accounts</p>
                </a>
            </li>

        </ul>
    </div>
</div>
