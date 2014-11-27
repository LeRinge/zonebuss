<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../img/logo.ico">
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
        
        .carousel-inner > .item > img { margin: 0 auto; }
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
           <img src="../img/logo.png" >
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>

                </button>

                 <a class="navbar-brand page-scroll" href="{{ URL::to('/'); }}">
                    
                    <i class="fa"></i>  <span> Zonebuss </span>
                </a>
            </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    
                   <li>
                        <a class="page-scroll" href="{{ URL::to('about'); }}">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ URL::to('contact'); }}">Contact</a>
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
                

            </div>
        </div>
        
    </header>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/L_u_1_z_Z_z" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
  
                    <li>
                        <a href="mx.linkedin.com/pub/luis-recillas/56/94a/774/" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer>
      
        <div class="container text-center">
            <p class="description">BBVA innova challege 2014</p>
        </div>
    </footer>
   
    
	
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
