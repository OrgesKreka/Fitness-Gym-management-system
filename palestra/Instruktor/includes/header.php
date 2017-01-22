<!DOCTYPE html>
<html lang="en">
<head>
 <title>Palestra X - Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="https://raw.githubusercontent.com/OrgesKreka/Fitness-Gym-management-system/master/ikona.ico" />
  
    <!-- CDN e bootstrap, jquery dhe fotorama -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CDN e datatable.net per te bere tabelat me funksionale -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
  
  <!-- CDN e Charts.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
  <!-- Skedaret lokale te bootstrap, jquery dhe fotorama-->
  <!-- <link rel="stylesheet" href="te_tjera/_bootstrap/css/bootstrap.min.css">
  <script src="te_tjera/_jquery/jquery.js"></script>
  <script src="te_tjera/_bootstrap/js/bootstrap.min.js"></script>

  <link  href="te_tjera/_fotorama/fotorama.css" rel="stylesheet"> 
  <script src="te_tjera/_fotorama/fotorama.js"></script>  -->

<!--   <link rel="stylesheet" href="_permbajtja/_permbajtjaIndex/css/style.css"> -->
  
  <style>

/*.navbar-default
{
  background-color:  ngjyra e top nav barit --- per tu ndryshuar
}*/

/************************* Formatimi i navbarit te Profilit *******************/
.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}


img
{
  width: 30px;
  height: 30px;
}

/*.profile-img
{
    margin-right: 5px;
    float: left;
    background: url(example.jpg) 50% 50% no-repeat;  
    background-size: auto 100%; 
    width: 25px;
    height: 25px;
}
*/
/*
 * Base structure
 */

/* Move down content because we have a fixed navbar that is 50px tall */
body 
{
  padding-top: 50px;
}


/*
 * Global add-ons
 */

.sub-header 
{
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 * Top navigation
 * Hide default border to remove 1px line.
 */
.navbar-fixed-top 
{
  border: 0;
}

/*
 * Sidebar
 */

/* Hide for mobile, show later */
.sidebar 
{
  display: none;

   background-color: #428bca;
}

@media (min-width: 768px) 
{
  .sidebar 
  {
    position: fixed;
    top: 51px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #f5f5f5; /** Ngjyra e side barit --- per tu ndyshuar */
    border-right: 1px solid #eee;
  }
}

/* Sidebar navigation */
.nav-sidebar 
{
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}

.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus 
{
  color: #fff;
  background-color: #428bca;
}


/*
 * Main content
 */

.main 
{
  padding: 20px;
}
@media (min-width: 768px)
 {
  .main 
  {
    padding-right: 40px;
    padding-left: 40px;
  }
}

.main .page-header 
{
  margin-top: 0;
}


/*
 * Placeholder dashboard ideas
 */

.placeholders 
{
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 
{
  margin-bottom: 0;
}
.placeholder 
{
  margin-bottom: 20px;
}
.placeholder img 
{
  display: inline-block;
  border-radius: 50%;
}
    
  </style>
</head>


<body>
