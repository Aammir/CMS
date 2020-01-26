@if(!empty($siteInfo->show_pinned_post_section)  && $siteInfo->show_pinned_post_section== 1)
<!-- s-extra
      ================================================== -->
<section class="s-extra" style="padding:50px 0 0 0;">

    <div class="row top">

        <div class="col-eight md-six tab-full popular">
            <h3>Pinned By Admin</h3>
            <div class="block-1-2 block-m-full popular__posts">
                @foreach($pinned as $pop)
                <?php // dd($pop);?>
                <article class="col-block popular__post">
                    <a href="{{url('/posts/'.$pop->slug)}}" class="popular__thumb">
                        <?php $pImg = (!empty($pop->image)? url('/images/posts-images/'.$pop->image): url('/assets/img/default.jpg'))?>
                        <img src="{{  $pImg }}" title="{{  $pop->title}}" alt="{{  $pop->title}}"/>
                    </a>
                    <h5><a href="{{url('/posts/'.$pop->slug)}}">{{ $pop->title}}</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="{{ url('/authors/'.ucfirst($pop->user->name))}}">{{ $pop->user->name }}</a></span><br/>
							{{---<span class="popular__category"><span>Under</span>
                        @foreach ($pop->category as $category)
                            <a href="{{ url('/categories/'.strtolower($category->slug)) }}">{{ $category->name }}</a>,
                        @endforeach
							</span><br/>---}}
                        <span class="popular__date"><span>on</span> <time datetime="{{$pop->created_at->format('j F, Y')}}">{{$pop->created_at->format('j F, Y')}}</time></span>
                    </section>
                </article>
                @endforeach
            </div> <!-- end popular_posts -->

        </div> <!-- end popular -->

        <div class="col-four md-six tab-full about">
            <h3>About Us</h3>

            <p>
                {!!   ucfirst($siteInfo->about_section_text) !!}
            </p>

            <ul class="about__social">
                    @if(!empty($sm->facebook))<li> <a href="{{ $sm->facebook }}"  title="Facebook" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i> </a> </li>@endif
                    @if(!empty($sm->twitter))<li> <a href="{{ $sm->twitter }}"  title="Twitter" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i> </a> </li>@endif
                    @if(!empty($sm->gplus))<li> <a href="{{ $sm->gplus }}"  title="Google Plus" target="_blank"> <i class="fa fa-google-plus" aria-hidden="true"></i> </a> </li>@endif
                    @if(!empty($sm->linkedin))<li> <a href="{{ $sm->linkedin }}"  title="Linkedin" target="_blank"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> </li>@endif
                    @if(!empty($sm->instagram))<li> <a href="{{ $sm->instagram }}"  title="Instagram" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i> </a> </li>@endif
                    @if(!empty($sm->pinterest))<li> <a href="{{ $sm->pinterest }}"  title="Pinterest" target="_blank"> <i class="fa fa-pinterest" aria-hidden="true"></i> </a> </li>@endif
                    @if(!empty($sm->youtube))<li> <a href="{{ $sm->youtube }}"  title="Youtube" target="_blank"> <i class="fa fa-youtube" aria-hidden="true"></i> </a> </li>@endif
                    @if(!empty($sm->whatsapp))<li> <a href="{{ $sm->whatsapp }}"  title="Whatsapp" target="_blank"> <i class="fa fa-mobile-phone" aria-hidden="true"></i> </a> </li>@endif
            </ul> <!-- end header__social -->
        </div> <!-- end about -->

    </div> <!-- end row -->
</section> <!-- end s-extra -->
@endif
    @if(!empty($siteInfo->show_tags) && $siteInfo->show_tags== 1)

    <section class="s-extra" style="padding:{{  ($siteInfo->show_pinned_post_section == 1?'0':'50px')  }} 0 50px 0;">
    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>Tags</h3>
            <div class="tagcloud">
                @foreach($tags as $tag)
                    <a href="{{url('/tags/'.strtolower($tag->slug))}}">{{ucfirst($tag->name)}}</a>
                @endforeach
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->
</section> <!-- end s-extra -->
    @endif
