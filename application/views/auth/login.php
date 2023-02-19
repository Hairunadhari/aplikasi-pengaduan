<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
	.login {
		display: flex;
		justify-content: center;
		margin-top: 150px;
	}

	form {
		width: 400px;

	}
    button{
        border: none;
        border-radius: 5px;
        font-weight: 600;
    }

</style>

<body>
	<div class="login">
		<div class="card">
			<div class="card-body">
				<form class="">
                    <div class="logo text-center mb-4 mt-1">
                        <h4>Login</h4>
                    </div>

					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example1">Username</label>
						<input type="email" id="form2Example1" class="form-control" />
					</div>

					<!-- Password input -->
					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example2">Password</label>
						<input type="password" id="form2Example2" class="form-control" />
					</div>

					<div class="row m-1">
                        <button class="bg-primary text-white text-center p-2">Submit</button>
                    </div>

					<!-- Register buttons -->
					<div class="text-center mt-4">
						<p>Belum Punya Akun ? <a href="<?= base_url('User/daftar') ?>">Daftar</a></p>
						
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
