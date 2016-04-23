<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />
    
    <title></title>

    <!--<link rel="stylesheet" href="http://fonts.useso.com/css?family=Arimo:400,700,400italic">-->
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="bookmark" href="/favicon.ico"/>

    @foreach ($common_css as $css)
    <link rel="stylesheet" href="{{$static_url}}{{$css}}?ver={{$version}}">
    @endforeach
    <script src="/assets/js/LAB.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
</head>
<body class="page-body">