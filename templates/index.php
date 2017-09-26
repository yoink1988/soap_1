<!--<!DOCTYPE html>-->
<html>
  <head>
    <meta charset="utf-8">
		<link href="templates/style.css" rel="stylesheet">
  </head>

<body>
	<div class="main" style="width: 1100px;margin: auto;">
		<div class="soap" style="width: 500px;float:left;">
			<label>Soap</label>
			<p>Show all goalkeepers or sorted by country</p>
			<div class="form">
				<form action="" method="post">
					Country: <input name="country" type="text"/><button name="soapFoot" type="submit">Show</button>
				</form>
				<br>
				<br>
			</div>
		</div>
		<div class="curl" style="width: 500px;float:right;margin: 20px;">
			<label>cURL</label>
			<p>Show all goalkeepers or sorted by country</p>
			<div class="form">
				<form action="" method="post">
					Country: <input name="country" type="text"/><button name="curl" type="submit">Show</button>
				</form>
				<br>
				<br>
			</div>
		</div>
		<div class="cbr-soap" style="width: 500px;float:right;margin: 20px;">
			<label>Soap</label>
			<p>Show data</p>
			<div class="form">
				<form action="" method="post">
				<button name="curl" type="submit">Show</button>
				</form>
				<br>
				<br>
			</div>
		</div>

		<br>



		<div class="content" style="margin-top: 400px;">
			%output%
		</div>
	</div>
</body>





  </body>
</html>
