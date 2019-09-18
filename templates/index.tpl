<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>{title}</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>	

        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        
        
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Wyszukaj...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div>
        </form>
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box" style="background: #2D2D2D;">
                        <a href="index.html" class="logo-text"><img src="logo-white.png" style="width: 80px;"/></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            
                            <ul class="nav navbar-nav navbar-right">
                                <li>	
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>
                                
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name">{username}</span>
                                        <img class="img-circle avatar" src="https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/s80-c-k-no/photo.jpg" width="40" height="40" alt="">
                                    </a>
                                    
                                </li>
                                <li>
                                    <a href="{logouturl}" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Wyloguj</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-image">
                                    <img src="https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/s80-c-k-no/photo.jpg" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span>{name}<br><small>{role}</small></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <li class="active"><a href="index.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Strona główna</p></a></li>
                        <li><a href="servers.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-hdd"></span><p>Twoje serwery</p></a></li>
                        <li><a href="invoices.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-edit"></span><p>Faktury</p></a></li>
                        <li><a href="settings.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-cog"></span><p>Ustawienia</p></a></li>
                        
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Witaj, {name}.</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Strona główna</a></li>

                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-lg-3 col-md-6" style="width: 33%;">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">{countServers}</p>
                                        <span class="info-box-title">Serwerów</span>
                                    </div>
                                    <div class="info-box-icon glyphicon">
                                        <i class="glyphicon-hdd" style="font-style: normal;"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6" style="width: 34%;">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">0</p>
                                        <span class="info-box-title">Domen</span>
                                    </div>
                                    <div class="info-box-icon glyphicon">
                                        <i class="glyphicon-globe" style="font-style: normal;"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6" style="width: 33%;">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">{countInvoices}</p>
                                        <span class="info-box-title">Faktur</span>
                                    </div>
                                    <div class="info-box-icon glyphicon">
                                        <i class="glyphicon-credit-card" style="font-style: normal;"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="invoice col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                <strong>Dane kontaktowe</strong><br>
                                                {name} {surname}<br>
                                                {user-zip}, {user-city}<br>
                                                {user-adresess}
                                            </p>
                                            <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Aktualizuj dane kontaktowe</button>
                                            <form id="add-row-form" action="javascript:void(0);">
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Aktualizacja danych</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="Imię i nazwisko" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Kod pocztowy" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" id="age-input" class="form-control" placeholder="Wiek" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="date-input" class="form-control date-picker" placeholder="Adres zamieszkania" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" id="salary-input" class="form-control" placeholder="Numer kontaktowy" required>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                                                    <button type="submit" id="add-row" class="btn btn-success">Aktualizuj</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                    </form>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <hr>
                                            <p>
                                                <h2>Moje serwery</h2>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 10px;">
                                            {serverstray}
                                        </div>
                                        
                                    </div><!--row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s">2016 &copy; hosted.pl</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/js/modern.min.js"></script>
        
    </body>
</html>