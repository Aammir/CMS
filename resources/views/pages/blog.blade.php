@extends('base')
@section('page-title','Blog')
@section('content')
<!-- s-content
================================================== -->
<section class="s-content">

        <div class="row">

                <div class="s-content__header col-full">
                    <h1 class="s-content__header-title">
                       Blog
                    </h1>
                </div> <!-- end s-content__header -->

                <div class="s-content__media col-full">
                    <div class="s-content__post-thumb">
@if(!empty($page->image))
        <img src="{{  url('images/'.$page->image) }}" title="{{  $page->title }}" alt="{{ $page->title }}"/>
@endif
                    </div>
                </div> <!-- end s-content__media -->

                <div class="col-full s-content__main">

                     {!! $page->body !!}

                </div> <!-- end s-content__main -->

            </div> <!-- end row -->


    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>
            @foreach($posts as $post)
            <?php // dd($post->category) ?>
            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <div class="entry__thumb">
                    <a href="{{  url('/posts/'.$post->slug) }}">
                        <?php $pImg = (!empty($post->image)? url('/images/posts-images/'.$post->image): url('/assets/img/default.jpg'))?>
                        <img src="{{  $pImg }}" title="{{  $post->title}}" alt="{{  $post->title}}"/>
                    </a>
                </div>

                <div class="entry__text">
                    <div class="entry__header">

                        <div class="entry__date">
                            <a href="#">{{$post->created_at->format('j F, Y')}}</a>
                        </div>
                        <h1 class="entry__title">
                            <a href="{{url('/posts/'.$post->slug)}}">{{ucfirst($post->title)}}</a>
                        </h1>
                    </div>
                    <div class="entry__excerpt">
                        <p>
                            {!! substr($post->body,0,90).'....' !!}
                        </p>
                    </div>

                    @if($post->category->count() > 0)
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                            @foreach ($post->category as $category)
                           <a href="{{url('/categories/'.strtolower($category->slug))}}">
                            {{ucfirst($category->name)}}
                        </a>
                            @endforeach
                        </span>
                    </div>
                    @endif
                </div>

            </article> <!-- end article -->
            @endforeach
        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="col-full">
            {!! $posts->links() !!}
        </div>
    </div>

</section> <!-- s-content -->
@endsection
