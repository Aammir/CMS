@extends('base')
@section('page-title','Contact')
@section('content')
<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow">

<div class="row">

    <div class="s-content__header col-full">
        <h1 class="s-content__header-title">
            Feel Free To Contact Us.
        </h1>
    </div> <!-- end s-content__header -->

    <div class="s-content__media col-full">
        <div id="map-wrap">
            {!! $siteInfo->map !!}
        </div>
    </div> <!-- end s-content__media -->

    <div class="col-full s-content__main">


        {!! $page->body !!}
        <div class="row">
            <div class="col-six tab-full">
                <h3>Where to Find Us</h3>

                <p>
                    <strong>Address:</strong>
                    {!! $siteInfo->address !!}

                </p>

            </div>

            <div class="col-six tab-full">
                <h3>Contact Info</h3>

                <p> <strong>Email:</strong> {!! $siteInfo->email !!} <br>
                    <strong>Phone:</strong>{{  $siteInfo->phone }}
                </p>

            </div>
        </div> <!-- end row -->

        <h3>Say Hello.</h3>

        <form name="cForm" id="cForm" method="post" data-route="{{url('/contactform')}}">
            <fieldset>
                @csrf
                <div class="form-field">
                    <input name="name" type="text" id="name" class="full-width" placeholder="Your Name" value="{{old('name')}}">

                </div>

                <div class="form-field">
                    <input name="email" type="text" id="email" class="full-width" placeholder="Your Email" value="{{old('email')}}">

                </div>

                <div class="form-field">
                    <!--<input name="cWebsite" type="text" id="cWebsite" class="full-width" placeholder="Website"  value="">-->
                </div>

                <div class="message form-field">
                    <textarea name="message" id="message" class="full-width" placeholder="Your Message" >{{old('message')}}</textarea>

                </div>

                <button type="submit" class="submit btn btn--primary full-width" id="submit">Submit</button>

            </fieldset>
        </form> <!-- end form -->


    </div> <!-- end s-content__main -->

</div> <!-- end row -->

</section> <!-- s-content -->
@endsection
