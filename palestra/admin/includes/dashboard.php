 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="http://localhost/palestra/admin/admin.php" class="text-center"><i class="glyphicon glyphicon-home"></i> <span>Paneli Administratorit</span> <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i><span>&nbsp; Inbox( 0 )</span></a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="http://localhost/palestra/admin/includes/anetaret.php"><i class="glyphicon glyphicon-user"></i> <span>&nbsp; Anëtarët</span></a></li>
                <li><a href="http://localhost/palestra/admin/includes/kodAnetari.php"><i class="glyphicon glyphicon-plus"></i> Shto Anetar</a></li>
                <li><a href=""><i class="glyphicon glyphicon-tower"></i> Shto Instruktor</a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="#"><i class="glyphicon glyphicon-usd"></i><span>&nbsp; Pagesat</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-exclamation-sign"></i><span>&nbsp; Pagesat e Antareve</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-alert"></i>&nbsp;<span> Antaret pa paguar</span></a></li>
            <li><a href="http://localhost/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>

            <li><a href="http:/localhost/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i> Kurset</a></li>
            <li><a href=""><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li><a href="http://localhost/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>

    
    <!-- Permbajtja Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-center">PalestraX</h1>

          <div class="row placeholders">
            <div class="col-xs-2 col-sm-2 placeholder">
            </div>

            <div class="col-xs-12 col-sm-8 placeholder">
                <canvas id="grafikuAnetaresimeve" width="100%" height="70%"></canvas>
            </div>

          </div>
        </div>


<!-- <?php 
    // $query = "SELECT perdorues_id, emri  FROM perdorues";
    // $result = $db->query( $query );

    // $perdorues = array();

    // foreach ( $result as $row ) 
    // {
    //   $perdorues[] = $row;
    // }
 ?> -->
<script>
var ctx = document.getElementById("grafikuAnetaresimeve");
var data = {
    labels: ["Janar", "Shkurt", "Mars", "Prill", "Maj", "Qershor", "Korrik", "Gusht", "Shtator", "Tetor", "Nentor", "Dhjetor"],
    datasets: [
        {
            label: "Ecuria e Antaresimeve",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [65, 59, 80, 81, 56, 55, 40, 58, 14, 75, 15, 14 ],
            spanGaps: false,
        }
    ]
};

var myLineChart = new Chart(ctx, {
    type: 'line',
    data: data,
});
</script>