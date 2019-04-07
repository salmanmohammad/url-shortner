<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include('config.php');

//Get top 100 frequently accessed URL 
$result = mysqli_query($conn, "select * from shortened_url order by hit_count desc limit 100");

?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Poppins:700" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  </head>
  <body>
    <!-- Header Menu-->
  <nav class="navbar navbar-expand-lg navbar-light" style="background:linear-gradient(rgba(79, 172, 254, 0.8) 0%, rgba(0, 242, 254, 0.8) 100%)">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="/url-shortner/shorten_url.php">Home</a>
	  <a class="nav-item nav-link active" href="#">History</a>
    </div>
  </div>
</nav>
  <!--Header Menu-->
    <div class="s012">
	<form>
      <table id="example" class="table table-striped table-bordered" style="width:100%;background:#ffffff">
        <thead>
            <tr>
                <th>No</th>
                <th>Long URL</th>
				<th>Short URL</th>
                <th>Hit Count</th>
                <th>Created</th>
                
            </tr>
        </thead>
        <tbody>
		<?php
		$no = 1;
		while($row = mysqli_fetch_array($result))
		{
            echo "<tr>
                <td>".$no."</td>
                <td>".$row['long_url']."</td>
                <td>".$_SERVER['HTTP_HOST'].'/url-shortner/index.php/'.$row['short_url']."</td>
				<td>".$row['hit_count']."</td>
                <td>".date('Y-m-d',strtotime($row['created']))."</td>
                </tr>";
			$no++;
		}	
		?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Long URL</th>
				<th>Short URL</th>
                <th>Hit Count</th>
                <th>Created</th>
            </tr>
        </tfoot>
    </table>
	</form>
    </div>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
