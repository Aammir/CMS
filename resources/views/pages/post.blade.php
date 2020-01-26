@extends('base')
@section('page-title') {{ ucfirst($post->title) }} @endsection
@section('content')

<!-- s-content
       ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                {{$post->title}}
            </h1>
            <ul class="s-content__header-meta">
                <li class="date">{{$post->created_at->format('j F, Y')}}</li>
                @if($post->category->count() > 0)
                <li class="cat">
                    In
                    @foreach($post->category as $category)
                    <a href="#0">{{$category->name}}</a>
                    @endforeach
                </li>
                @endif
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                @if(!empty($post->image))<img src="{{  url('/images/posts-images/'.$post->image) }}" title="{{  $post->title}}" alt="{{  $post->title}}"/>@endif
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

            {!! $post->body !!}<!-- end s-content__pagenav -->

            <p class="s-content__tags">
                <span>Post Tags</span>

                <span class="s-content__tag-list">
                    <?php // dd($post->tag);?>
                    @foreach($post->tag as $tag)
                    <a href="{{url('/tags/'.strtolower($tag->slug))}}">{{ucfirst($tag->name)}}</a>
                    @endforeach
                </span>

            </p> <!-- end s-content__tags -->

            <div class="s-content__author">
                    <a href="{{url('/authors/'.$post->user->name)}}">
                        <?php $AuthImg = (!empty($post->user->image)? url('/assets/img/'.$post->user->image): url('/assets/img/user-def.jpg'))?>
                        <img src="{{  $AuthImg }}" title="{{  ucfirst($post->user->name) }}" alt="{{  ucfirst($post->user->name) }}"/>
                    </a>
                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a href="{{url('/authors/'.$post->user->name)}}">{{ ucfirst($post->user->name) }}</a> <!--==========================
                    ======from authros table author name=========
                    ==========================-->
                    </h4>
                    <!--==========================
                    ======from authros table author details=========
                    ==========================-->

<p>{!! $post->user->info !!}</p>

                </div>
            </div>

            <div class="s-content__pagenav">
                <div class="s-content__nav">
                    <?php if(empty($previous->title)) { } else{?>
                    <div class="s-content__prev">
                        <a href="<?=url('/posts/'.$previous->slug);?>" rel="prev">
                            <span>Previous Post</span>
                            <?=ucfirst($previous->title);?>
                        </a>
                    </div>
                    <?php }?>
                    <?php if(empty($next->title)) { } else{?>
                    <div class="s-content__next" style="<?php if(empty($previous->title)){echo 'float:right;'; }?>">
                        <a href="<?= url('/posts/'.$next->slug);?>" rel="next">
                            <span>Next Post</span>
                            <?= ucfirst($next->title);?>
                        </a>
                    </div>
                     <?php }?>
                </div>
            </div> <!-- end s-content__pagenav -->
        </div> <!-- end s-content__main -->
    </article>
    <!-- comments
    ================================================== -->

    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">
                <?php function numSpan($number){ echo "<span class='number'>".$number."</span>";}?>
                <?php if($post->comment->count() > 0){?>
                    <h3 class="h2"><?=($post->comment->count())==1?numSpan(1).' Comment':numSpan($post->comment->count()).' Comments';?></h3><?php }else {?>
                <h3 class="h2"> Comments</h3><?php }?>
                <!-- commentlist -->
                <ol class="commentlist">
                    <?php if($post->comment->count() > 0){?>
                    @foreach($post->comment as $cmnt)
                    <li class="depth-1 comment">
                        <?php // dd($cmnt);?>
                        <div class="comment__avatar">
                            <img width="50" height="50" class="avatar" src="{{url('/assets/img/user-def.jpg')}}" alt="">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <cite>{{ucfirst($cmnt->name)}}</cite>

                                <div class="comment__meta">
                                    <time class="comment__time">{{date("d M, Y @ h:i:s A", strtotime($cmnt->created_at))}}</time>
                                    <!--<a class="reply" href="#0">Reply</a>-->
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>{{$cmnt->comment}}</p>
                            </div>

                        </div>

                    </li> <!-- end comment level 1 -->
                    @endforeach
                <?php }else{?>
                    <li class="depth-1 comment"></li>
                <?php   }?>

                </ol> <!-- end commentlist -->


                <!-- respond
                ================================================== -->
<div class="respond">

    <h3 class="h2">Add Comment</h3>

    <form name="commentForm" id="commentForm" method="post" data-route="{{url('/comment')}}">
        <fieldset>
            @csrf
            <div class="form-field">
                <input name="name" type="text" id="name" class="full-width" placeholder="Your Name" value="{{old('name')}}">

            </div>

            <div class="form-field">
                <input name="email" type="text" id="email" class="full-width" placeholder="Your Email" value="{{old('email')}}">

            </div>

            <div class="form-field">
                <input name="post_id" type="hidden" id="post_id" class="hide" value="{{$post->id}}">
            </div>

            <div class="message form-field">
                <textarea name="comment" id="comment" class="full-width" placeholder="Your Comment" >{{old('comment')}}</textarea>

            </div>

            <button type="submit" name="submit" id="submit" class="submit btn btn--primary full-width">Submit</button>

        </fieldset>
    </form> <!-- end form -->

</div> <!-- end respond -->

            </div> <!-- end col-full -->

        </div> <!-- end row comments -->
    </div> <!-- end comments-wrap -->

</section> <!-- s-content -->
@endsection
