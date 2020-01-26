@extends('base')
@section('page-title') Category Archive: <?=ucfirst(str_replace("-"," ",$slug));?> @endsection
@section('content')
<!-- s-content
================================================== -->
<section class="s-content">
    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php // dd($category_post);?>
                Category Archive: <?=ucfirst(str_replace("-"," ",$slug));?>
            </h1>
        </div> <!-- end s-content__header -->
    </div>


    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

            @foreach($category_post as $post)
            <?php // dd($post->category) ?>
            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <div class="entry__thumb">

                    <a href="{{url('/posts/'.$post->slug)}}">
                        @if(!empty($post->image))<img src="{{  url('/images/posts-images/'.$post->image) }}" title="{{  $post->title}}" alt="{{  $post->title}}"/>@endif
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
                            <a href="{{url('/categories/'.strtolower($category->slug))}}">{{ucfirst($category->name)}}</a>
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

        </div>
    </div>


</section> <!-- s-content -->
@endsection
