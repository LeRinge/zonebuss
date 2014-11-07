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
    {{ HTML::style('//www.fuelcdn.com/fuelux/3.2.1/css/fuelux.min.css') }}
  	{{ HTML::style('font-awesome-4.2.0/css/font-awesome.min.css') }}

  <!-- Custom Fonts -->
   
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />

     <style type="text/css">
        .top-buffer { margin-bottom:10px; }
         
     </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
               
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
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    
                    <div class="fuelux">
                        <div class="wizard" id="myWizard" data-initialize="wizard">
                            <ul class="steps">
                                <li data-step="1" class="active"><span class="badge">1</span>Tipo de negocio<span class="chevron"></span></li>
                                <li data-step="2"><span class="badge">2</span>Ubicacion<span class="chevron"></span></li>
                                <li data-step="3"><span class="badge">3</span>Finalizar<span class="chevron"></span></li>
                            </ul>
                       
                            <div class="actions">
                                <button class="btn btn-default btn-prev"><span class="glyphicon glyphicon-arrow-left"></span>Prev</button>
                                <button class="btn btn-default btn-next" data-last="Complete">Next<span class="glyphicon glyphicon-arrow-right"></span></button>
                            </div>
                        
                        
                          <div class="step-content">
                                <div class="step-pane active " data-step="1">                            
                                    <div class="container">
                                        <div class="row top-buffer">
                                            <div class="col-md-2 col-md-offset-1">
                                               <button type="button" class="btn btn-default btn-lg" data-toggle="button" >
                                                    <img src="../img/Icons/Car.png" alt="64x64">
                                                    
                                               </button>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/barsandrestaurants.png" alt="64x64">
                                                    
                                                    </button>
                                                    
                                            </div>
                                            <div class="col-md-2">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/beauty.png" alt="64x64">
                                                     </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/book.png" alt="64x64">
                                                     </button>
                                            </div>
                                             <div class="col-md-2">
                                                <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/constructionmaterials.png" alt="64x64">
                                                    
                                                 </button>
                                            </div>
                                        </div>
                                        <div class="row top-buffer">
                                           
                                            <div class="col-md-2 col-md-offset-1">
                                                 <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/education.png" alt="64x64">
                                                     </button>
                                            </div>
                                            <div class="col-md-2">
                                                  <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/fashion.png" alt="64x64">
                                                     </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/food.png" alt="64x64">
                                                     </button>
                                            </div>
                                             <div class="col-md-2">
                                               <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/health.png" alt="64x64">
                                                     </button>
                                            </div>
                                            <div class="col-md-2">
                                                  <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/hyper.png" alt="64x64">
                                                 </button>
                                            </div>
                                        </div>
                                        <div class="row top-buffer">
                                           
                                            <div class="col-md-2 col-md-offset-1">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/jewelry.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/leisure.png" alt="64x64">
                                                </button>
                                            </div>
                                             <div class="col-md-2">
                                                <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/music.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/office.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/others.png" alt="64x64">
                                                 </button>
                                            </div>
                                        </div>
                                        <div class="row top-buffer">
                                           
                                            <div class="col-md-2 col-md-offset-1">
                                                   <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/pet.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/services.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                  <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/shoes.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                 <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/sport.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                  <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/tech.png" alt="64x64">
                                                 </button>
                                            </div>
                                        </div>
                                        <div class="row top-buffer">
                                            <div class="col-md-2 col-md-offset-1">
                                               <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/travel.png" alt="64x64">
                                                 </button>
                                            </div>
                                             <div class="col-md-2">
                                                <button type="button" class="btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/home.png" alt="64x64">
                                                 </button>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="step-pane" data-step="2">
                                    <div id="map" style="width: 1000px; height: 400px"></div>
                                </div>
                                <div class="step-pane" data-step="3">
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>BBVA Innova challenge 2014</h2>                
            </div>
        </div>
    </section>

    
	
    <!-- jQuery -->
    {{ HTML::script('js/jquery.js') }}

    <!-- Bootstrap Core JavaScript -->
    
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Plugin JavaScript -->
   
    {{ HTML::script('js/bootstrap.min.js') }}

    <script src="//www.fuelcdn.com/fuelux/3.2.1/js/fuelux.min.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

    <!-- Custom Theme JavaScript -->
  
    {{ HTML::script('js/grayscale.js') }}
    {{ HTML::script('js/app.js') }}
</body>

</html>