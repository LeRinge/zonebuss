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
         .top-buffer { margin-top:20px; }
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
                <div class="row top-buffer ">
                    <div class="col-md-8 col-md-offset-2">

                          <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/oPsKcbX2oyY?rel=0"></iframe>
                        </div>                
                    </div>
                </div>
                <div class="row top-buffer ">
                    <div class="col-md-8 col-md-offset-2">
                        <a class="btn btn-success" href="{{ URL::to('find'); }}">Comenzar ahora!</a> 
                        <!-- 4:3 aspect ratio -->
                        

                    </div>
                </div>        

            </div>
        </div>
        
    </header>
    <section id="funcionalidades">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 text-center">
                  <h2 class="section-heading descriptionTitleBig">Funcionalidades</h2>
                </div>
              </div>
              <div class="row text-center">
              <div class="col-md-4">
              <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                  <i class="fa fa-building fa-stack-1x fa-inverse"></i>
              </span>
            <h4 class="descriptionTitle">Localiza</h4>
            <p class="description">Elige el rubro del negocio que quieras establecer.</p>
            </div>
            <div class="col-md-4">
            <span class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="descriptionTitle">Compara</h4>
            <p class="description">Compara dos zonas potenciales para tu negocio.</p>
            </div>
            <div class="col-md-4">
            <span class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-pie-chart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="descriptionTitle">Estadisticas</h4>
            <p class="description">Detecta patrones de consumo actuales a trav&eacute;s de gr&aacute;ficas.</p>
            </div>
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
    {{ HTML::script('js/jquery-2.1.1.min.js') }}

    <!-- Bootstrap Core JavaScript -->
    
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Custom Theme JavaScript -->
  
    {{ HTML::script('js/grayscale.js') }}

    

</body>

</html>
