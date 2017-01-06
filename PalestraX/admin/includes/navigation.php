<?php 
    require_once '../baza_te_dhenave/database_handler.php';
 ?>


<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PalestraX</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="nav-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Kurset</a></li>
                <li><a href="#" target="_blank">Anëtarët</a></li>
                <li><a href="#" target="_blank">Instruktorët</a></li>
                <li><a href="#" target="_blank">Administratorët</a></li>  
            </ul>

            <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <!-- The Profile picture inserted via div class below, with shaping provided by Bootstrap -->
                        <div class="img-rounded profile-img"></div>
                        Orges Kreka &nbsp;
                        <img src="te_tjera/imazhe_profili/faraday.jpg" alt=""><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Përditëso Profilin</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="#">Dil</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>