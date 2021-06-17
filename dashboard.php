<?php

session_start();
// Include database connection file
include_once('config.php');

if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}

?>
<style type="text/css">
    .nav-link{
	color: #f9f6f6;
	font-size: 14px;
    }	
</style>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
       <body>
	    <nav class="navbar navbar-info sticky-top bg-info flex-md-nowrap p-10">
		<h3 style="color:bisque"><?= $_SESSION['ROLE']." " ?>LoggedIn</h3>
	            <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
		    	    <a class="nav-link"  href="logout.php">Hi, <?php echo $_SESSION['NAME']; ?> Log out</a>
			</li>
		    </ul>
		</nav>		
		<div class="container-fluid">
		<div class="row">
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
		    <h1 class="h2"><?=$_SESSION['NAME'] ?>'s Dashboard</h1>
		</div>
		<div class="table-responsive">
		  <table class="table table-striped">
		    <thead>
		       <tr>
			   <th>Name</th>
			   <th>Username</th>
			   <th>Role</th>
			</tr>
		    </thead>
		    <tbody>
			<?php
		    	if ($_SESSION['ROLE'] == "Admin") {
				$query = "SELECT * FROM admins WHERE role in ('Head','Counsellor','Sub-Counsellor','Center')";
			    }
                else if ($_SESSION['ROLE'] == "Head") {
                    $query = "SELECT * FROM admins WHERE role in ('Counsellor','Sub-Counsellor','Center')";
                }
                else if ($_SESSION['ROLE'] == "Counsellor") {
                    $query = "SELECT * FROM admins WHERE role in ('sub-counsellor','center')";
                }
                else{
				   $role = $_SESSION['ROLE'];
				   $query = "SELECT * FROM admins WHERE role = '$role' and id = '".$_SESSION['ID']."'";
			    }

			        $result = $con->query($query);
				if ($result->num_rows > 0) {
			    	   while ($row = $result->fetch_array()) {
			    ?>		

			    <tr>
				<td><?php echo $row['name']?></td>
				<td><?php echo $row['username']?></td>
				<td><?php echo $row['role']?></td>
			    </tr>
		        <?php	}

			}else{
			    echo "<h2>No record found!</h2>";
			} ?>									
			</tbody>
		    </table>
		</div>
	    </main>
	</div>
    </div>		
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    feather.replace();
</script>			
</body>
</html>