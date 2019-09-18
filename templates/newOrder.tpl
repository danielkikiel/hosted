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
        <link href="assets/plugins/pricing-tables/css/style.css" rel="stylesheet" type="text/css">

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
                        <li><a href="index.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Strona główna</p></a></li>
                        <li class="active"><a href="servers.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-hdd"></span><p>Twoje serwery</p></a></li>
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
                            <li><a href="servers.php">Twoje serwery</a></li>
                            <li><a href="servers.php?section=order&do=newOrder">Zamówienie</a></li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="invoice col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="row">
                                        
                                        
                                        <div class="cd-pricing-container">
                                        <div class="cd-pricing-switcher">
                                            <p class="fieldset">
                                                <input type="radio" class="no-uniform" name="duration-1" value="monthly" id="monthly-1" checked>
                                                <label for="monthly-1">Miesiąc</label>
                                                <input type="radio" class="no-uniform" name="duration-1" value="yearly" id="yearly-1">
                                                <label for="yearly-1">Rok</label>
                                                <span class="cd-switch"></span>
                                            </p>
                                        </div>
                                        <ul class="cd-pricing-list cd-bounce-invert">
                                            <li>
                                                <ul class="cd-pricing-wrapper">
                                                    <li data-type="monthly" class="is-visible">
                                                        <header class="cd-pricing-header">
                                                            <h2>{opt1}</h2>
                                                            <div class="cd-price">
                                                                <span class="cd-currency">PLN</span>
                                                                <span class="cd-value">25</span>
                                                                <span class="cd-duration">mc</span>
                                                            </div>
                                                        </header>
                                                        <div class="cd-pricing-body">
                                                            <ul class="cd-pricing-features">
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                            </ul>
                                                        </div>
                                                        <footer class="cd-pricing-footer">
                                                            <a class="cd-select" href="servers.php?section=order&do=newOrder&option=buy&plan={opt1}">Wybierz</a>
                                                        </footer>
                                                    </li>
                                                    <li data-type="yearly" class="is-hidden">
                                                        <header class="cd-pricing-header">
                                                            <h2>{opt1}</h2>
                                                            <div class="cd-price">
                                                                <span class="cd-currency">PLN</span>
                                                                <span class="cd-value">250</span>
                                                                <span class="cd-duration">rok</span>
                                                            </div>
                                                        </header>
                                                        <div class="cd-pricing-body">
                                                            <ul class="cd-pricing-features">
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                            </ul>
                                                        </div>
                                                        <footer class="cd-pricing-footer">
                                                            <a class="cd-select" href="servers.php?section=order&do=newOrder&option=buy&plan={opt1}">Wybierz</a>
                                                        </footer>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="cd-popular">
                                                <ul class="cd-pricing-wrapper">
                                                    <li data-type="monthly" class="is-visible">
                                                        <header class="cd-pricing-header">
                                                            <h2>{opt2}</h2>
                                                            <div class="cd-price">
                                                                <span class="cd-currency">PLN</span>
                                                                <span class="cd-value">60</span>
                                                                <span class="cd-duration">mc</span>
                                                            </div>
                                                        </header>
                                                        <div class="cd-pricing-body">
                                                            <ul class="cd-pricing-features">
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                            </ul>
                                                        </div>
                                                        <footer class="cd-pricing-footer">
                                                            <a class="cd-select" href="servers.php?section=order&do=newOrder&option=buy&plan={opt2}">Wybierz</a>
                                                        </footer>
                                                    </li>
                                                    <li data-type="yearly" class="is-hidden">
                                                        <header class="cd-pricing-header">
                                                            <h2>{opt2}</h2>
                                                            <div class="cd-price">
                                                                <span class="cd-currency">PLN</span>
                                                                <span class="cd-value">600</span>
                                                                <span class="cd-duration">rok</span>
                                                            </div>
                                                        </header>
                                                        <div class="cd-pricing-body">
                                                            <ul class="cd-pricing-features">
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                            </ul>
                                                        </div>
                                                        <footer class="cd-pricing-footer">
                                                            <a class="cd-select" href="servers.php?section=order&do=newOrder&option=buy&plan={opt2}">Wybierz</a>
                                                        </footer>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="cd-pricing-wrapper">
                                                    <li data-type="monthly" class="is-visible">
                                                        <header class="cd-pricing-header">
                                                            <h2>{opt3}</h2>
                                                            <div class="cd-price">
                                                                <span class="cd-currency">PLN</span>
                                                                <span class="cd-value">90</span>
                                                                <span class="cd-duration">mc</span>
                                                            </div>
                                                        </header>
                                                        <div class="cd-pricing-body">
                                                            <ul class="cd-pricing-features">
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                            </ul>
                                                        </div>
                                                        <footer class="cd-pricing-footer">
                                                            <a class="cd-select" href="servers.php?section=order&do=newOrder&option=buy&plan={opt3}">Wybierz</a>
                                                        </footer>
                                                    </li>
                                                    <li data-type="yearly" class="is-hidden">
                                                        <header class="cd-pricing-header">
                                                            <h2>{opt3}</h2>
                                                            <div class="cd-price">
                                                                <span class="cd-currency">pln</span>
                                                                <span class="cd-value">900</span>
                                                                <span class="cd-duration">rok</span>
                                                            </div>
                                                        </header>
                                                        <div class="cd-pricing-body">
                                                            <ul class="cd-pricing-features">
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                                <li><em>przykładowa</em> wartość</li>
                                                            </ul>
                                                        </div>
                                                        <footer class="cd-pricing-footer">
                                                            <a class="cd-select" href="servers.php?section=order&do=newOrder&option=buy&plan={opt3}">Wybierz</a>
                                                        </footer>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
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
        <script src="assets/plugins/pricing-tables/js/main.js"></script>
        <script src="assets/js/modern.min.js"></script>
        
    </body>
</html>