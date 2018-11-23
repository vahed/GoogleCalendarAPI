<!DOCTYPE html>
<html lang="en">
<head>
  <title>Incident form</title>'
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">

				<div class="page-header">
					<h1>Inciden/Illness form</h1>
				</div>    

				<!-- FORM STARTS HERE -->
				<form method="POST" action="" novalidate>
					
					<div class="form-group">
						<label for="child name">Child name</label>
						<input type="text" name="childName" id="child name" class="form-control" value="" >
					</div>

					<div class="form-group">
						<label for="d_o_b">Address</label>
						<input name="d_o_b" id="d_o_b" class="form-control" value="">
					</div>
                    <div class="form-group">
						<label for="parent name">City</label>
						<input type="text" name="parentName" id="parent name" class="form-control" value="">
					</div>
					<div class="form-group">
						<label for="phone">Phone number</label>
						<input type="text" name="phone" id="phone" class="form-control" value="" >
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="text" name="email" id="email" class="form-control" value="" >
					</div>
					<div class="form-group">
						<label for="email">Inciden/Illness details</label>
						<input type="text" name="email" id="email" class="form-control" value="" >
					</div>
					<button id="sessButton" name="sessButton" type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
		</div>
    </body>
</html>