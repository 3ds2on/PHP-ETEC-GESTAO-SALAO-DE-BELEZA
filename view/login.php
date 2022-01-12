<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-5 mx-auto">

            <div class="card">
            <div class="card-header text-light" style="background-color: #b4918f">
			Area Restrita
            </div>
            <div class="card-body">
                <form action="index.php?classe=usuario&metodo=logar" method="post">
                    <div class="form-group">    
                        <label>E-mail</label>
                        <input class="form-control" type="email" name="email" required>
                    </div>
                    <div class="form-group">    
                        <label>Senha</label>
                        <input class="form-control" type="password" name="senha" required>
                    </div>
					<center><input class="btn btn-primary; text-light" type="submit" value="Logar" style="background-color: #b4918f"></center>
					<p> </p> 
                </form>
            </div>
            </div>
        </div>
    </div>
	<p>
	</p>
	<p>
	</p>
	<center><img src="images/logo.jpg" alt="some text" width=300 height=200></center>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>