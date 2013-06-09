<html>
	<head>
		<title>Bar Code App</title>
		<script type = "text/javascript" src="includes/js/jquery-1.10.1.min.js"></script>
                <script type = "text/javascript" src="includes/js/list.min.js"></script>
		<script type = "text/javascript" src="includes/js/makeForm.js"></script>
		<link rel='stylesheet' href='includes/style.css'></link>
	</head>
	<body>
		<H1 align="center">Bar Code App</H1>
		<hr>
		<form id="companyList" action="includes/routes.php" method="GET">
			<table align="right">
				<tr>
					<td>Get BarCode List For</td>
					<td>
						<input type='hidden' value="getList" name='op'>
						<select name='cList'>
							<option value =0>Client</option>
							<option value =1>D-Mart</option>
						</select>
						<input type = "submit" name = "Get List">
					</td>
				</tr>
			</table>
		</form>
		<br><br>
		<div>
			<form name="createBarcode" action="includes/routes.php" method="POST">
                            <div id ="PO">
				<table id="appendList" border='1px' border-collapse: collapse align="center">
					<thead></thead>
					<tbody class="list"></tbody>
					<tfoot></tfoot>
				</table>
                            </div>
			</form>
		</div>
		<script type="text/javascript" src='includes/js/getList.js'></script>
	</body>
</html>
