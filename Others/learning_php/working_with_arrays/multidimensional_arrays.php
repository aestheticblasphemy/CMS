<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Multidimensional Arrays </div></td>
  </tr>
</table>
<div align="center"><br>
  
  <span class="txt14bb_white"><br>
  Let's work on multidimensional arrays. </span><br>  
  <br>
</div>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt12b_black">  
		  <?php
		  
		  		// smaller arrays...
		  		$array_single[0] = "Region A";
		  		$array_single[1] = "Region B";
		  		$array_single[2] = "Region C";
		
				$array_multi[0][0] = "Region A";
		  		$array_multi[0][1] = "Region B";
		  		$array_multi[0][2] = "Region C";		
				
				$array_multi[1][0] = 1001;
		  		$array_multi[1][1] = 2002;
		  		$array_multi[1][2] = 3005;		
				
				
				// ----------------------------------------------------------------
				// Example #2...
				
		  
		  		// $chart [ 'chart_data' ][ 0 ][ 0 ] // we ignore the 0 column. You can do that!
				$chart [ 'chart_data' ][ 0 ][ 1 ] = "Region A";
				$chart [ 'chart_data' ][ 0 ][ 2 ] = "Region B";
				$chart [ 'chart_data' ][ 0 ][ 3 ] = "Region C";
				// $chart [ 'sales_data' ][ 0 ][ 1 ] = "Region A";
			
				
				for ( $row = 1; $row <= 25; $row++ ) {
					for ( $col = 1; $col <= 3; $col++ ) {
						$chart [ 'chart_data' ][ $row ][ $col ] = rand ( 0, 100 );
						$chart [ 'sales_data' ][ $row ][ $col ] = rand ( 10000, 1000000 );
						$chart [ 'projected_data' ][ $row ][ $col ] = rand ( 100000, 200000 );
					}
				}
			
				
				/*
				// Here we set up rows of different data ranges...
				for ( $row = 1; $row <= 25; $row++ ) {
					$chart [ 'chart_data' ][ $row ][ 1 ] = rand ( 1000, 1999 );
					$chart [ 'chart_data' ][ $row ][ 2 ] = rand ( 2000, 2999 );
					$chart [ 'chart_data' ][ $row ][ 3 ] = rand ( 3000, 3999 );
				}
				
				*/
				
		?>
		  <div align="center"><br>
		  Charting Data:<br> 		
		    </p> 
		    </div>		  
		  <table width="400" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
            <tr>
              <td><table width="100%"  border="0" cellpadding="1" cellspacing="1" class="tbl_border">
                  <tr align="center" class="tbl_drk_gray">
                    <td width="10%"><?php echo $chart [ 'chart_data' ][ 0 ][ 1 ]; ?></td>
                    <td width="10%"><?php echo $chart [ 'chart_data' ][ 0 ][ 2 ]; ?></td>
                    <td width="10%"><?php echo $chart [ 'chart_data' ][ 0 ][ 3 ]; ?></td>
                    </tr>
		<?php
				// Here we display the data that we stored in the array above...
				for ( $row = 1; $row <= 25; $row++ ) {
					$class = "tbl_white";
					if ($row % 2 == 0) $class = "tbl_gray";
					echo '<tr align="center" class="', $class, '">';
					for ( $col = 1; $col <= 3; $col++ ) {
						echo "<td>".$chart [ 'chart_data' ][ $row ][ $col ]."</td>";
					}
	
					echo "</tr>";
				}
		?>
              </table></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
