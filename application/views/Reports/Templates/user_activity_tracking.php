<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Activity Tracking</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url().('assets/admin/img/brokenshirecollege.png')?>" />
	<style type="text/css">
		body{
			font-family: Tahoma;
		}

		h3.report-title{
			margin: 0px;
		}

		small{
			font-size: 9px;
		}

		p{
			font-size: 11px;
		}

		.report-table{
			font-size: 10px;
			vertical-align: middle;
		}

		thead, th{
			text-transform: uppercase;
			text-align: center;
		}

		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    padding: 8px;
		}

		tbody, td{
		    text-align: left;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
	</style>
</head>
<body>
	<h3 class="report-title">User Activity Tracking Report</h3>
	<small>Report Generated : <?php echo date('F d, o H:i:s');?></small>
	<hr>
	<p style="text-align: right;">Total Records : <?php echo $data['iTotalRecords'];?></p>
	<table class="report-table">
		<thead>
			<tr>
				<th rowspan="2" colspan="1" style="width: 50px;">#</th>
				<th colspan="3">User Information</th>
				<th colspan="2">Activity Information</th>
			</tr>
			<tr>
				<th>Username</th>
				<th>Role</th>
				<th>IP Address</th>
				<th>Activity</th>
				<th>Date and Time</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$counter = 0;
			foreach ($data['aaData'] as $key) {
				echo '<tr>';
				echo '<td>'.$counter++.'</td>';
				echo '<td>'.$key['username'].'</td>';
				echo '<td>'.$key['role_desc'].'</td>';
				echo '<td>'.$key['ip_address'].'</td>';
				echo '<td>'.$key['action'].'</td>';
				echo '<td>'.$key['datetime'].'</td>';
				echo '</tr>';
			}
		?>
		</tbody>
	</table>
</body>
</html>