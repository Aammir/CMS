@extends('base')
@section('page-title')  @if(!empty($page)) {{  ucfirst($page->title) }} @endif  @endsection
@section('content')
<?php // dd($page);?>
<section class="s-content s-content--narrow">
@if(!empty($page))
    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                {{  ucfirst($page->title) }}
            </h1>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                    <?php $pImg = (!empty($page->image)? url('/images/'.$page->image): url('/assets/img/default.jpg'))?>
                    <img src="{{  $pImg }}" title="{{  $page->title}}" alt="{{  $page->title}}"/>
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

             {!! $page->body !!}

        </div> <!-- end s-content__main -->

    </div> <!-- end row -->
@endif
</section> <!-- s-content -->

@endsection
