<html>
	<body>
		<form action="/addMember" method="POST">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			FirstName: <input type="text" id="firstName" name="firstName"><br>
			MiddleName: <input type="text" id="middleName" name="middleName"><br>
			LastName: <input type="text" id="lastName" name="lastName"><br>
			Address: <input type="text" id="address" name="address"><br>
			<input type="submit" value="Add member">
		</form>
	</body>
</html>