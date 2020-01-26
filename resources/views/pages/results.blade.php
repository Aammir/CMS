@extends('base')
@section('page-title','Search Results')
@section('content')
<!-- s-content
================================================== -->
<section class="s-content">
    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php
                if (count($results) == 0) {
                    echo 'No Result found';
                } else {
                    $res = (count($results) == 1 ? 'Result' : 'Results');
                    echo count($results) . ' ' . $res . ' found for "' . $request . '"';
                }
                ?>
            </h1>
        </div> <!-- end s-content__header -->
    </div>


    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

            @foreach($results as $result)
            <?php // dd($result->category) ?>
            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <div class="entry__thumb">
                    <a href="{{url('/posts/'.$result->slug)}}">
@if(!empty($result->image))<img src="{{  url('/images/posts-images/'.$result->image) }}" title="{{  $result->title}}" alt="{{  $result->title}}"/>@endif
                    </a>
                </div>

                <div class="entry__text">
                    <div class="entry__header">

                        <div class="entry__date">
                            <a href="#">{{$result->created_at->format('j F, Y')}}</a>
                        </div>
                        <h1 class="entry__title">
                            <a href="{{url('/posts/'.$result->slug)}}">{{ucfirst($result->title)}}</a>
                        </h1>
                    </div>
                    <div class="entry__excerpt">
                        <p>
                            {!!  substr($result->body,0,90).'....' !!}
                        </p>
                    </div>

                    @if($result->category->count() > 0)
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                            @foreach ($result->category as $category)
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
