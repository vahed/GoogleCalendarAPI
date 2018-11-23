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
					<h1>Club session registeration form</h1>
				</div>    

				<!-- FORM STARTS HERE -->
				<form method="POST" action="" novalidate>
					
					<div class="form-group">
						<label for="child name">Child name</label>
						<input type="text" name="childName" id="child name" class="form-control" >
					</div>

					<div class="form-group">
						<label for="d_o_b">Date of birth</label>
						<input name="d_o_b" id="d_o_b" class="form-control">
					</div>
                    <div class="form-group">
						<label for="parent name">Parent name</label>
						<input type="text" name="parentName" id="parent name" class="form-control">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="address" id="address" class="form-control">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" class="form-control" >
					</div>
					
					
					<div class="form-check">						
						<div class="twoSess" id="twoSess">
							<label class="form-check-label">
							  <input type="checkbox" name="session1" value="session1" class="form-check-input">
							  Breakfast club - £8
							</label><br>
							<label class="form-check-label">
							  <input type="checkbox" name="session1" value="session1" class="form-check-input">
							  After school club session one from 15:00 to 16:00 - £6
							</label><br>
							<label class="form-check-label">
							  <input type="checkbox" name="session2" value="session2" class="form-check-input">
							  After school club session two from 16:00 to 17:00 - £6
							</label><br><br>
						</div>
					</div>
					
					<button id="sessButton" name="sessButton" type="submit" class="btn btn-success">Create booking</button>
				</form>
			</div>
		</div>
    </body>
</html>