@if(!empty($siteInfo->show_main_footer) && $siteInfo->show_main_footer== 1)
<!-- s-footer
     ================================================== -->
<footer class="s-footer" style="padding: 60px 0 0 0;">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-two md-four mob-full s-footer__sitelinks">

                <h4>Quick Links</h4>

                <ul class="s-footer__linklist">
                    @foreach($nav as $link)
                    <li><a href="{{  strtolower(url('/page/'.$link->slug))}}" title="{{ucfirst($link->title)}}">{{ucfirst($link->title)}}</a></li>
                    @endforeach
                </ul>

            </div> <!-- end s-footer__sitelinks -->

            <div class="col-two md-four mob-full s-footer__archives">

                <h4>Categories</h4>

                <ul class="s-footer__linklist">
                    @foreach($categories as $category)
                    <li><a href="{{strtolower(url('/categories/'.$category->slug))}}">{{ucfirst($category->name)}}</a></li>
                    @endforeach
                </ul>

            </div> <!-- end s-footer__archives -->

            <div class="col-two md-four mob-full s-footer__social">

                <h4>Social</h4>

                <ul class="s-footer__linklist">
                        @if($sm->facebook)<li> <a href="{{ $sm->facebook }}"  title="Facebook" target="_blank"> Facebook </a> </li>@endif
                        @if($sm->twitter)<li> <a href="{{ $sm->twitter }}"  title="Twitter" target="_blank"> Twitter</a> </li>@endif
                        @if($sm->gplus)<li> <a href="{{ $sm->gplus }}"  title="Google Plus" target="_blank"> Google Plus </a> </li>@endif
                        @if($sm->linkedin)<li> <a href="{{ $sm->linkedin }}"  title="Linkedin" target="_blank"> Linkedin </a> </li>@endif
                        @if($sm->instagram)<li> <a href="{{ $sm->instagram }}"  title="Instagram" target="_blank"> Instagram </a> </li>@endif
                        @if($sm->pinterest)<li> <a href="{{ $sm->pinterest }}"  title="Pinterest" target="_blank"> Pinterest </a> </li>@endif
                        @if($sm->youtube)<li> <a href="{{ $sm->youtube }}"  title="Youtube" target="_blank"> Youtube </a> </li>@endif
                        @if($sm->whatsapp)<li> <a href="{{ $sm->whatsapp }}"  title="Whatsapp" target="_blank"> Whatsapp </a> </li>@endif
                </ul>

            </div> <!-- end s-footer__social -->

            <div class="col-five md-full end s-footer__subscribe">

                <h4>Our Newsletter</h4>

                <p>{{ucfirst($siteInfo->newsletter)}}</p>

                <div class="subscribe-form">
                    <form id="subscribe" class="group" data-route="{{  url('/subscribers')}}" method="post">
                        @csrf
                        <input type="text" value="" name="subscriber_email" class="email" id="email" placeholder="Email Address">

                        <input type="submit" id="submit" name="submit" value="Send">

                        <label for="subscriber_email" class="subscribe-message" id="subscribe-message"></label>

                    </form>
                </div>

            </div> <!-- end s-footer__subscribe -->

        </div>
    </div> <!-- end s-footer__main -->


</footer> <!-- end s-footer -->
@endif
@if(!empty($siteInfo->show_footer_bottom) && $siteInfo->show_footer_bottom== 1)
<div class="s-footer__bottom" style="padding: 30px 0 20px 0;">
    <div class="row">
        <div class="col-full">
            <div class="s-footer__copyright">
                <span>{!! ucfirst($siteInfo->footer_bottom) !!}</span>
                {{-- <span>{!! $siteInfo->site_info !!}</span> --}}
            </div>

            <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"></a>
            </div>
        </div>
    </div>
</div> <!-- end s-footer__bottom -->
@endif
<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader">
        <div class="line-scale">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!-- Java Script
================================================== -->
<script src="{{url('/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{url('/js/plugins.js')}}"></script>
<script src="{{url('/js/main.js')}}"></script>
<script src="{{url('/js/script.js')}}"></script>
