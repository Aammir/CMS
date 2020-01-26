@extends('base')
@section('page-title') Posts by
<?= ucfirst(str_replace("-", " ", $slug)); ?>
@endsection
@section('content')
<!-- s-content
================================================== -->
<section class="s-content" style="padding-top: 50px;padding-bottom: 50px;background-color:#FFF !important;">
  <div class="row">
        <?php  $auth_img = (!empty($author->image) ? url('/assets/img/'.$author->image) :url('assets/img/user-def.jpg')); ?>
    <div class="col-1-5"><img src="{{ $auth_img }}" alt="{{ $author->name}}" style="max-height: 200px;border: 2px solid #DDD;"></div>
    <div class="col-2-3">
      <h4 class="s-content__author-name" style="margin-top:0;"> {{ ucfirst($author->name)}}</a> </h4>
      <p>{!!  $author->info !!}</p>
    </div>
  </div>
</section>
<section class="s-content" style="padding-bottom:10px !important;padding-top: 30px;">
  <div class="row">
    <div class="s-content__header col-full">
      <h1 class="s-content__header-title">
        <?php // dd($category_post);?>
        {{  $author_posts->count() }} Posts by
        <?= ucfirst(str_replace("-", " ", $slug)); ?>
      </h1>
    </div>
  </div>
</section>
<section class="s-content" style="padding-top: 10px;">
  <div class="row">
    <div class="row masonry-wrap">
      <div class="masonry">
        <div class="grid-sizer"></div>
        @foreach($author_posts as $post)
        <?php // dd($post->category) ?>
        <article class="masonry__brick entry format-standard" data-aos="fade-up">
          <div class="entry__thumb"> <a href="{{  url('/posts/'.$post->slug)}}">
            @if(!empty($post->image))<img src="{{  url('/images/posts-images/'.$post->image) }}" title="{{  $post->title}}" alt="{{  $post->title}}"/>@endif
        </div>
          <div class="entry__text">
            <div class="entry__header">
              <div class="entry__date"> <a href="#">{{$post->created_at->format('j F, Y')}}</a> </div>
              <h1 class="entry__title"> <a href="{{url('/posts/'.$post->slug)}}">{{ucfirst($post->title)}}</a> </h1>
            </div>
            <div class="entry__excerpt">
              <p> {!!  substr($post->body,0,90).'....' !!} </p>
            </div>
            @if($post->category->count() > 0)
            <div class="entry__meta"> <span class="entry__meta-links"> @foreach ($post->category as $category) <a href="{{url('/categories/'.strtolower($category->slug))}}">{{ucfirst($category->name)}}</a> @endforeach </span> </div>
            @endif </div>
        </article>
        <!-- end article -->
        @endforeach </div>
      <!-- end masonry -->
    </div>
  </div>
  <!-- end masonry-wrap -->
  <div class="row">
    <div class="col-full"> </div>
  </div>
</section>
<!-- s-content -->
@endsection
