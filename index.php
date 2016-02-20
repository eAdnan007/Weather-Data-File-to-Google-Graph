<!DOCTYPE html>
<html>
    <head>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
              var weather_data = <?php require( 'parser.php' ); ?>
          </script>
          <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
          <div id="chart_div"></div>
    </body>
</html>