<?php

include('component/com-laporan.php');

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['transaksi_kamar', 'total_biaya_kamar'],
          ['transaksi_kamar',  <?php echo $total_laporan_transaksi ?>'],
        ]);

        var options = {
          chart: {
            title: 'TRANSAKSI LAPORAN KAMAR',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <center><div id="columnchart_material" style="width: 900px; height: 600px;"></div></center>
  </body>
</html>