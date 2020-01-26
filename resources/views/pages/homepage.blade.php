@extends('homelayout')
@section('page-title','Home')
@section('content')
<div class="pageheader-content row">
  <div class="col-full">
    <div class="featured"> @if($home1 !="")
      <div class="featured__column featured__column--big">
        <div class="entry" @if($home1->image != "") style="background-image:url('/images/posts-images/{{  $home1->image }}')" @else  style="background-image:url('{{ url('/assets/img/default.jpg') }}')"  @endif>
          <div class="entry__content">
              @foreach($home1->category as $category)
            <span class="entry__category"><a href="{{ url('/categories/'.strtolower($category->slug))}}">
                {{  ucfirst($category->name)}}</a></span>
                @endforeach
            <h1><a href="{{  url('/posts/'.$home1->slug)  }}" title="{{ $home1->title }}">{{  ucfirst($home1->title)}}</a></h1>
            <div class="entry__info">
            <a href="{{  url('/authors/'.$home1->user->name)  }}" class="entry__profile-pic">
                <?php if(!empty($home1->user->image)){$img = $home1->user->image;}else{$img='default/user-def.jpg';} ?>
                <img class="avatar" src="{{ url('/assets/img/'.$img) }}" alt="{{  $home1->user->name}}">
            </a>
              <ul class="entry__meta">
                <li><a href="{{  url('/authors/'.$home1->user->name)  }}">{{  $home1->user->name}}</a></li>
                <li>{{  $home1->created_at->format('j F, Y')  }}</li>
              </ul>
            </div>
          </div>
          <!-- end entry__content -->
        </div>
        <!-- end entry -->
      </div>
      <!-- end featured__big -->
      @endif
      <div class="featured__column featured__column--small"> @if($home2 !="")
        <div class="entry" @if($home2->image != "") style="background-image:url('/images/posts-images/{{  $home2->image }}')" @else  style="background-image:url('{{ url('/assets/img/default.jpg') }}')" @endif>
          <div class="entry__content"> @foreach($home2->category as $category) <span class="entry__category">
              <a href="{{url('/categories/'.strtolower($category->slug))}}">{{ucfirst($category->name)}}</a></span> @endforeach
            <h1><a href="{{url('/posts/'.$home2->slug)}}" title="">{{ucfirst($home2->title)}}</a></h1>
            <div class="entry__info"> <a href="{{url('/authors/'.$home2->user->name)}}" class="entry__profile-pic">
                <img class="avatar" src="{{url('/images/posts-images/'.$home2->user->image)}}" alt="{{$home2->user->name}}"> </a>
              <ul class="entry__meta">
                <li><a href="{{url('/authors/'.$home2->user->name)}}">{{$home2->user->name}}</a></li>
                <li>{{$home2->created_at->format('j F, Y')}}</li>
              </ul>
            </div>
          </div>
          <!-- end entry__content -->

        </div>
        <!-- end entry -->
        @endif
        @if($home3 !="")
        <div class="entry" @if($home3->image != "") style="background-image:url('/images/posts-images/{{  $home3->image }}')" @else  style="background-image:url('{{ url('/assets/img/default.jpg') }}')" @endif>
          <div class="entry__content">
              @foreach($home3->category as $category)
                <span class="entry__category">
                  <a href="{{  url('/categories/'.strtolower($category->slug))}} ">
                    {{  ucfirst($category->name) }}
                </a>
                </span>
            @endforeach
            <h1><a href="{{url('/posts/'.$home3->slug)}}" title="{{$home3->title}}">{{$home3->title}}</a></h1>
            <div class="entry__info"> <a href="{{url('/authors/'.$home3->user->name)}}" class="entry__profile-pic"> <img class="avatar" src="{{url('/images/posts-images/'.$home3->user->image)}}" alt="{{$home3->user->name}}"> </a>
              <ul class="entry__meta">
                <li><a href="{{url('/authors/'.$home3->user->name)}}">{{$home3->user->name}}</a></li>
                <li>{{$home3->created_at->format('j F, Y')}}</li>
              </ul>
            </div>
          </div>
          <!-- end entry__content -->

        </div>
        <!-- end entry -->
        @endif </div>
      <!-- end featured__small -->
    </div>
    <!-- end featured -->

  </div>
  <!-- end col-full -->
</div>
<!-- end pageheader-content row -->

</section>
<!-- end s-pageheader -->

<!-- s-content
================================================== -->
<section class="s-content">
  <div class="row masonry-wrap">
    <div class="masonry">
      <div class="grid-sizer"></div>
      @foreach($posts as $post)
      <?php // dd($post->category) ?>
      <article class="masonry__brick entry format-standard" data-aos="fade-up">
        <div class="entry__thumb"> <a href="{{url('/posts/'.$post->slug)}}">
            @if(!empty($post->image))<img src="{{  url('/images/posts-images/'.$post->image) }}" title="{{  $post->title}}" alt="{{  $post->title}}"/>@endif
        </a> </div>
        <div class="entry__text">
          <div class="entry__header">

            <div class="entry__date">
                <a href="#">{{  $post->created_at->format('j F, Y') }}</a>
            </div>

            <h1 class="entry__title">
                <a href="{{  url('/posts/'.$post->slug) }}">
                    {{  ucfirst($post->title)  }}
                </a>
            </h1>

        </div>
          <div class="entry__excerpt">
            <p> {!! substr($post->body,0,90).'....' !!} </p>
          </div>
          @if($post->category->count() > 0)
          <div class="entry__meta"> <span class="entry__meta-links">
              @foreach ($post->category as $category)
              <a href="{{  url('/categories/'.strtolower($category->slug) ) }}">
                {{  ucfirst($category->name)  }}
              </a>
              @endforeach
            </span>
        </div>
          @endif </div>
      </article>
      <!-- end article -->
      @endforeach </div>
    <!-- end masonry -->
  </div>
  <!-- end masonry-wrap -->

  <div class="row">
    <div class="col-full"> {!! $posts->links() !!} </div>
  </div>
</section>
<!-- s-content -->
@endsection
