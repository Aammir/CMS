<!--- basic page needs
    ================================================== -->
<meta charset="utf-8">
<title>@yield('page-title') | @if(!empty($siteInfo->site_name)) {{ $siteInfo->site_name }} @endif</title>
<meta name="description" content="@if(!empty($siteInfo->site_meta_info)) {{ $siteInfo->site_meta_info }} @endif">
<meta name="author" content="Aamir">

<!-- mobile specific metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{url('/css/base.css')}}">
<link rel="stylesheet" href="{{url('/css/vendor.css')}}">
<link rel="stylesheet" href="{{url('/css/main.css')}}">
<link rel="stylesheet" href="{{url('/css/style.css')}}">

<!-- script
================================================== -->
<script src="{{url('/js/modernizr.js')}}"></script>
<script src="{{url('/js/pace.min.js')}}"></script>

<!-- favicons
================================================== -->
@if(!empty($siteInfo->favicon))
    <link rel="shortcut icon" href="{{  url('/assets/img/'.$siteInfo->favicon)  }}" type="image/x-icon">
    <link rel="icon" href="{{ url('/assets/img/'.$siteInfo->favicon)  }}" type="image/x-icon">
@endif
<style>
 .search-field {    color: #FFF !important;}
 p{text-align: justify;}
 .s-content__post-thumb img {
    margin: 0 auto;
    display: block;
}.entry__thumb img {
    display: block;
    margin: 0 auto;
}
</style>
