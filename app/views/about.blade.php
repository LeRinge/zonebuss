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
        .inner {
    display: table;
    margin: 0 auto;
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
                <div class="inner">
                  <img src="../img/logo.png" >
                </div>
                <div class="inner">
                 <h5><p style="text-align:justify"><span class="about">
                       ZONEBUSS es un prototipo desarrollado para la <br>
                       competici&oacute;n de BBVA Innova challenge 2014.<br>
                        
                       La idea en ZONEBUSS es poder comparar dos <br>
                       zonas potenciales para estabelecer nuestro <br>
                       negocio, basandonos en informaci&oacute;n de patrones <br>
                       de consumo proporcionados por BBVA en base a <br>
                       un dataset y mezclandolos con datos externos <br>
                       de negocios cercanos a estas zonas.<br>

                      
                        </span>
                     </p>
                </h5>
                     <h5><p style="text-align:justify"><span class="about">
                 El comparar las zonas nos ayuda en tomar la <br>
                       mejor decisi&oacute;n, enfocandonos en el mercado<br>
                       que mas consume , los dias, y los meses, para <br>
                       optimizar nuestras ganancias.<br>

                       Los datos de los negocios son tomados de la <br>
                       API de Factual, donde contiene mas de un millon <br>
                       de negocios registrados en M&eacute;xico.<br>
                  </p>
                </h5>
                </div>      
            </div>
        </div>
        
    </header>

   
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

    <!-- Plugin JavaScript -->
   
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Custom Theme JavaScript -->
  
    {{ HTML::script('js/grayscale.js') }}

</body>

</html>
