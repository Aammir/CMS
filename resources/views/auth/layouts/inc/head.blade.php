<head>
    <meta charset="utf-8" />

    {{-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico"> --}}

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | Dashboard | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('/assets/css/light-bootstrap-dashboard.css')}}" rel="stylesheet" />

    <style>
        .mar-bot-1{margin-bottom:20px;display:block;}
        .dropdown:hover>.dropdown-menu{display:block !important;opacity: 1 !important;visibility: visible !important;}
        .modal .modal-content .modal-header .modal-profile i {
            font-size: 32px;
            padding-top: 24px;
            margin-right: 7px;
        }
        .nav-link[data-toggle].collapsed::after {
            content: "▾";
            float: right;
            font-size: 26px;
        }label {
            font-size: 12px;
            margin-bottom: 5px;
            text-transform: uppercase;
        } a.close {
            position: absolute;
            right: 2px;
            margin-top: 2px;
            z-index: 1033;
            background-color:#40BEDE;
            display: block;
            border-radius: 96%;
            line-height: 9px;
            width: 25px;
            height: 25px;
            outline: 0 !important;
            text-align: center;
            padding: 3px;
            font-weight: 300;
            color: #FFF !important;
        }
        a.close .fa-times {
            top: -3px;
            position: relative;
            right: 0px;
            color: #FFF !important;
        }
        textarea.form-control{height:66px;}
        /*        .modal {top: -20% !important;}*/

        input[type="file"] {
            background: #40BEDE !important;
            color: #fff !important;
        }td {
            font-size: 14px;
        }
        .texonomy{list-style-type: none;padding-left: 15px;}
        .slug-show{color:#AAA;padding:5px 0;}
        #preSlug {
            border: 0;
            width: 26%;
            background: transparent !important;
            color:#AAA;
            pointer-events:none;padding: 0;
        }

        #slug {
            border: 0;
            width: 60%;
            background: transparent !important;
            color:#AAA;
            pointer-events:none;padding: 0;margin-left: -2px;
        }
        .lnk-addon{color:#BBB;}
        .border-danger{border-color: #FB404B !important;}
        .img-thmbnail{max-height:45px;}
        .records-title{float: left;padding: 0;line-height: 0px;}
        .txt-w{color:#FFF !important;}
		.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 12px 8px;
    vertical-align: top;
}
    </style>
    <link href="{{url('/assets/css/redactor.min.css')}}" rel="stylesheet" />
    <script src="{{url('assets/js/redactor3.js')}}" type="text/javascript"></script>
</head>
