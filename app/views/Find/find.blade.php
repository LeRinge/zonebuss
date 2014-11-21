<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Zonebuss</title
       <!-- Bootstrap Core CSS -->
	 <!-- Custom CSS -->
  	{{ HTML::style('css/bootstrap.min.css') }}
  	{{ HTML::style('css/grayscale.css') }}
    {{ HTML::style('css/fuelux.min.css') }}
  	{{ HTML::style('font-awesome-4.2.0/css/font-awesome.min.css') }}
    {{ HTML::style('css/mapbox.css') }}

  <!-- Custom Fonts -->
   
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
   



     <style type="text/css">
        .top-buffer { margin-bottom:10px; }
        .top-bufferCharts { margin-bottom:25px; }
        .top-bufferChartsGender { margin-bottom:5px; }
          .map { position: relative;float: left;width:100%; height: 480px; }
          .mapC { position: relative;float: left;width:100%; height: 360px; }
          .centered img { display: inline; }
     </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="fuelux" >
   
    

  
     <div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                    <div class="row">
                      
                        <div class="col-md-4">
                          <img src="../img/ajax-loader.gif" id="loading-indicator" />
                        </div>
                        <div class="col-md-8">
                           <h3 style="color:#000"> Generating resume...</h3>
                         </div>

                      
                    </div> 
                 </div>
                 
              </div>
            </div>
      </div>

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
                <div class="row">
                    
                  
                        <div class="wizard" id="myWizard" data-initialize="wizard" data-restrict="previous">
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
                                <div class="step-pane active sample-pane" data-step="1">                            
                                    <div class="container">
                                        <div class="row top-buffer">
                                            <div class="col-md-2 col-md-offset-1">
                                               <button id="mx_auto" autocomplete="off" type="button" class="icon btn btn-default btn-lg" data-toggle="button" aria-pressed="false" >
                                                    <img src="../img/Icons/car.png" alt="64x64">
                                                    
                                               </button>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                   <button id="mx_barsandrestaurants" autocomplete="off" type="button" class="icon  btn btn-default btn-lg" data-toggle="button" aria-pressed="false">
                                                    <img src="../img/Icons/barsandrestaurants.png" alt="64x64">
                                                    
                                                    </button>
                                                    
                                            </div>
                                            <div class="col-md-2">
                                                   <button id="mx_beauty" type="button" class="icon btn btn-default btn-lg"data-toggle="button">
                                              <img src="../img/Icons/beauty.png" alt="64x64">
                                                     </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button id="mx_book" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/book.png" alt="64x64">
                                                     </button>
                                            </div>
                                             <div class="col-md-2">
                                                <button id="mx_constructionmaterials" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/constructionmaterials.png" alt="64x64">
                                                    
                                                 </button>
                                            </div>
                                        </div>
                                        <div class="row top-buffer">
                                           
                                            <div class="col-md-2 col-md-offset-1">
                                                 <button id="mx_education" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/education.png" alt="64x64">
                                                     </button>
                                            </div>
                                            <div class="col-md-2">
                                                  <button id="mx_fashion" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/fashion.png" alt="64x64">
                                                     </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button id="mx_food" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/food.png" alt="64x64">
                                                     </button>
                                            </div>
                                             <div class="col-md-2">
                                               <button id="mx_health" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/health.png" alt="64x64">
                                                     </button>
                                            </div>
                                            <div class="col-md-2">
                                                  <button id="mx_hyper" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/hyper.png" alt="64x64">
                                                 </button>
                                            </div>
                                        </div>
                                        <div class="row top-buffer">
                                           
                                            <div class="col-md-2 col-md-offset-1">
                                                   <button id="mx_jewelry" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/jewelry.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button id="mx_leisure" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/leisure.png" alt="64x64">
                                                </button>
                                            </div>
                                             <div class="col-md-2">
                                                <button id="mx_music" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/music.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button id="mx_office" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/office.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                   <button id="mx_others" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/others.png" alt="64x64">
                                                 </button>
                                            </div>
                                        </div>
                                        <div class="row top-buffer">
                                           
                                            <div class="col-md-2 col-md-offset-1">
                                                   <button id="mx_pet" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/pet.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                <button id="mx_services" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/services.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                  <button id="mx_shoes" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/shoes.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                 <button id="mx_sport" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/sport.png" alt="64x64">
                                                 </button>
                                            </div>
                                            <div class="col-md-2">
                                                  <button id="mx_tech" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/tech.png" alt="64x64">
                                                 </button>
                                            </div>
                                        </div>
                                        <div class="row top-buffer">
                                            <div class="col-md-2 col-md-offset-1">
                                               <button id="mx_travel" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/travel.png" alt="64x64">
                                                 </button>
                                            </div>
                                             <div class="col-md-2">
                                                <button id="mx_home" type="button" class="icon btn btn-default btn-lg" data-toggle="button">
                                                    <img src="../img/Icons/home.png" alt="64x64">
                                                 </button>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="step-pane" data-step="2" >
                                    <div id="map" class="map"></div>
                                </div>
                                <div class="step-pane" data-step="3">
                                  <div class="jumbotron">
                                  <h1>Finalizar</h1>
                                  <p>Estos son las configuraciones elegidas.</p>

                                </div>
                                </div>
                          </div>
                        </div> 
                      
                </div>

            </div>
    </header>
   

    <section id="charts" class="chartBack" style="display:none">
        <div id="direcctions" class="row">
             <div  class="col-md-4 col-md-offset-1">
                <h5><span id="direccion" class="label label-info"></span></h5>
             </div>
             <div  class="col-md-2">

             </div>
             <div  class="col-md-4 ">
                <h5><span id="direccionCompare" class="label label-info"></span></h5>
             </div>      
        </div>
        <div id="maps" class="row top-bufferCharts">

            <div  class="col-md-4 col-md-offset-1">
                <div class="mapC" id="mapC" ></div>
            </div>
             <div  class="col-md-2">
             
             </div>
             <div  class="col-md-4">
                <div class="mapC" id="mapCompare" ></div>
             </div>
        </div>
        <div id="genderCharts" class="row top-bufferCharts">
            <div  class="col-md-4 col-md-offset-1">
                <div class="row">
                     <div  class="col-md-3">
                        <h5><span>Genero<span>
                     </div>
                     <div  class="col-md-3">
                            Rango Edad
                     </div>
                      <div  class="col-md-3">
                           Promedio Ticket
                     </div>
                     <div  class="col-md-3">
                            Maxico ticket
                     </div>
                </div>
                <div class="row top-bufferChartsGender">
                     <div  class="col-md-3">
                            <img src="../img/men.png" alt="32x32">
                     </div>
                     <div  class="col-md-3">
                            25-40
                     </div>
                      <div class="col-md-3">
                            300
                     </div>
                     <div  class="col-md-3">
                            600
                     </div>
                </div>
                <div class="row">
                     <div  class="col-md-3">
                            <img src="../img/woman.png" alt="32x32">
                     </div>
                     <div  class="col-md-3">
                            25-40
                     </div>
                      <div class="col-md-3">
                            300
                     </div>
                     <div class="col-md-3">
                            600
                     </div>
                </div>
             </div>   
            <div  class="col-md-2">
            </div>
            <div  class="col-md-4">
                <div class="row">
                     <div  class="col-md-3">
                        <h5><span>Genero<span>
                     </div>
                     <div  class="col-md-3">
                            Rango Edad
                     </div>
                      <div  class="col-md-3">
                           Promedio Ticket
                     </div>
                     <div  class="col-md-3">
                            Maxico ticket
                     </div>
                </div>
                <div class="row top-bufferChartsGender">
                     <div  class="col-md-3">
                            <img src="../img/men.png" alt="32x32">
                     </div>
                     <div  class="col-md-3">
                            25-40
                     </div>
                      <div class="col-md-3">
                            300
                     </div>
                     <div  class="col-md-3">
                            600
                     </div>
                </div>
                <div class="row">
                     <div  class="col-md-3">
                            <img src="../img/woman.png" alt="32x32">
                     </div>
                     <div  class="col-md-3">
                            25-40
                     </div>
                      <div class="col-md-3">
                            300
                     </div>
                     <div class="col-md-3">
                            600
                     </div>
                </div>
            </div>  

        </div>
        <div id="salesCharts" class="row top-bufferCharts">
            <div  class="col-md-4 col-md-offset-1">
                <canvas id="salesChart" width="300" height="150"></canvas>
             </div>
             <div  class="col-md-2">

             </div>
             <div  class="col-md-4 ">
                <canvas id="salesChartCompare" width="300" height="150"></canvas>
             </div> 
        </div>   
         <div id="weekCharts" class="row top-bufferCharts">
            <div  class="col-md-4 col-md-offset-1">
                <canvas id="weekChart" width="300" height="150"></canvas>
             </div>
             <div  class="col-md-2">

             </div>
             <div  class="col-md-4 ">
                <canvas id="weekChartCompare" width="300" height="150"></canvas>
             </div> 
        </div>   
         <div id="Charts" class="row top-bufferCharts">
            <div  class="col-md-4 col-md-offset-1">
                <canvas id="radarChart" width="400" height="200"></canvas>
             </div>
             <div  class="col-md-2">

             </div>
             <div  class="col-md-4 ">
                <canvas id="radarChartCompare" width="400" height="200"></canvas>
             </div> 
        </div>   
    </section>

         

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>BBVA Innova challenge 2014</h2>                
            </div>
        </div>
    </section>

    {{ HTML::script('js/jquery.js') }}  
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/fuelux.min.js') }} 
    {{ HTML::script('js/mapbox.js') }}  
    {{ HTML::script('js/grayscale.js') }}
    {{ HTML::script('js/ajaxq.js') }}
    {{ HTML::script('js/app.js') }}
    {{ HTML::script('js/Chart.min.js') }}

    <script>

</script>
</body>

</html>
