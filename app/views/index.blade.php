<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Zonebuss</title>
     <!-- Bootstrap Core CSS -->
	 <!-- Custom CSS -->
  	{{ HTML::style('css/bootstrap.min.css') }}
  	{{ HTML::style('css/grayscale.css') }}
    {{ HTML::style('font-awesome-4.2.0/css/font-awesome.min.css') }}
  <!-- Custom Fonts -->
    
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <style type="text/css">
         .top-buffer { margin-bottom:15px; }
         .carousel-indicators {
                bottom:-50px;
            }
        .carousel-inner {
            margin-bottom:50px;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa"></i>  <span> Zonebuss </span>
                </a>
            </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row top-buffer ">
                    <div class="col-md-8 col-md-offset-2">
                            <div id="carousel" class="carousel slide" data-ride="carousel" data-, data-interval="2400">
                                  <!-- Indicators -->
                                  <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                     <li data-target="#carousel-example-generic" data-slide-to="2"</li>
                                  </ol>

                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner" role="listbox">
                        
                                    <div class="item active">
                                      <img src="../img/map2.png" >
                                      <div class="carousel-caption caption-top-righ">
                                        <span class="textcarosel">Encuentra una zona</span>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="../img/commerce2.png" >
                                      <div class="carousel-caption caption-top-righ">
                                        <span class="textcarosel">Elige una categoria</span>
                                      </div>
                                    </div>
                                      <div class="item">
                                      <img src="../img/chart.png" >
                                     <div class="carousel-caption caption-top-righ">
                                        <span class="textcarosel">Compara con otras zonas</span>
                                      </div>
                                    </div>
                                
                                  </div>
                            </div>                   
                    </div>
                </div>
                <div class="row top-buffer ">
                    <div class="col-md-8 col-md-offset-2">
                        <a class="btn btn-default" href="{{ URL::to('find'); }}">Comenzar ahora!</a> 
                    </div>
                </div>        

            </div>
        </div>
        
    </header>

   
    
	
    <!-- jQuery -->
    {{ HTML::script('js/jquery.js') }}

    <!-- Bootstrap Core JavaScript -->
    
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Plugin JavaScript -->
   
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Custom Theme JavaScript -->
  
    {{ HTML::script('js/grayscale.js') }}

</body>

</html>
