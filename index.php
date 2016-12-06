<?php

require_once 'configs/connect.php';
require 'configs/custom.php';
require 'configs/pagination.php';

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cemitério de Startups</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- bootstrap widget theme -->
    <link rel="stylesheet" href="css/theme.bootstrap.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesh../dist/css/bootstrap.min.csseet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="dist/js/jquery-latest.js"></script>
    <script type="text/javascript" src="dist/js/jquery.tablesorter.js"></script>
      
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
          <a class="navbar-brand" href="#">Cemitério de Startups</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 main">
          <div class="row placeholders">
            <div class="col-xs-12 col-sm-4 placeholder" id="total">
              <h1><?php echo "$res_numRows"; ?></h1>
              <h4>Total</h4>
              <span class="text-muted">Total de startups cadastradas</span>
            </div>
            <div class="col-xs-12 col-sm-4 placeholder">
              <h1><?php echo "$name_problem"; ?></h1>
              <h4>Motivo</h4>
              <span class="text-muted">Maior motivo de morte de uma startup</span>
            </div>
            <div class="col-xs-12 col-sm-4 placeholder">
              <h1><?php echo "$city"; ?></h1>
              <h4>Cidade</h4>
              <span class="text-muted">Cidade onde morrem mais startups</span>
            </div>
          </div>

            <hr />
          <!-- <h2 class="sub-header">Section title</h2> -->
            <h3 align="center" id="case">Cases de Fracassos de Startups Brasileiras</h3>

            <div class="submenu" id="submenu">
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default btn-success">Cadastrar startup</button>
                    <button type="button" class="btn btn-default btn-danger">Reportar erro</button>
                </div>
            </div>
            <p></p>
        
          <div class="table-responsive">
            <table class="tablesorter table-striped table-hover table-condensed table-responsive" id="desktop">
              <thead>
                <tr>
                    <th>#</th>
                    <!-- <th>Inclusão</th> -->
                    <th>Startup</th>
                    <th>Pitch</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th>Motivo</th>
                    <th>Quote do empreendedor</th>
                    <th>Born</th>
                    <th>Fail</th>
                    <th>Investimento</th>
                    <th>Fundador</th>
                </tr>
              </thead>
              <tbody>
                  
                  <?php 
					while($row = mysql_fetch_array($query)){
						$f1 = $row['id'];
						//$f2 = $row['date_include'];
						$f3 = $row['name_startup'];
						$f4 = $row['pitch'];
						$f5 = $row['city'];
                        $f6 = $row['state'];
						$f7 = $row['id_problem'];
						$f8 = $row['more_info'];
                        $f9 = $row['date_born'];
						$f10 = $row['date_fail'];
						$f11 = $row['investiment'];
                        $f12 = $row['name_founder'];
						?>
                  <tr>
                    <td><?php echo $f1;?></td>
                    <!--<td><?php // echo $f2;?></td> -->
                    <td><?php echo $f3;?></td>
                    <td><?php echo $f4;?></td>
                    <td><?php echo $f5;?></td>
                    <td><?php echo $f6;?></td>
                    <td><?php echo $f7;?></td>
                    <td><?php echo $f8;?></td>
                    <td><?php echo $f9;?></td>
                    <td><?php echo $f10;?></td>
                    <td><?php echo $f11;?></td>
                    <td><?php echo $f12;?></td>
                      <?php
						}
					?>
                  </tr>
              </tbody>
            </table>
              
              <table class="table table-striped" id="mobile">
              <thead>
                <tr>
                    <th>Startup</th>
                    <th>Motivo</th>
                    <th>Fundador</th>
                </tr>
              </thead>
              <tbody>
                  
                  <?php 
					while($row = mysql_fetch_array($query)){
						$f3 = $row['name_startup'];
						$f7 = $row['id_problem'];
                        $f12 = $row['name_founder'];
						?>
                <tr>
                    <td><?php echo $f3;?></td>
                    <td><?php echo $f7;?></td>
                    <td><?php echo $f12;?></td>
                    <?php
						}
					?>
                </tr>
              </tbody>
              </table>
              
          </div>
        
        
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                      <a href="index.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Primeira</span>
                      </a>
                    </li>
                    <?php for($i=0;$i<$pages;$i++){ 
                    $style = "";
                    if($pages == $i)
                        $style = "class=\"active\"";
                    ?>
                    <li <?php echo $style; ?> ><a href="index.php?page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>
                    <?php } ?>
                    <li>
                      <a href="index.php?page=<?php echo $pages; ?>" aria-label="Next">
                        <span aria-hidden="true">Última &raquo;</span>
                      </a>
                    </li>
                  </ul>
            </nav>
        </div>
       </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <!--<script src="../../assets/js/vendor/holder.min.js"></script> 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
      <script type="text/javascript">
          
          $("#desktop").tablesorter({
            theme : 'blue',
            // sort on the first column and second column in ascending order
            sortList: [[0,0],[1,0]],
  });</script>
  </body>
</html>