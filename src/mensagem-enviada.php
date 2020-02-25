<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            .erro{
                color: red;
                font-size:40;
            }

            .ok{
                color:green;
                font-size:40;
            }

            .link{
                font-size:20;
            }
        </style>
	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="../images/logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">

                    <?php 
                        if(isset($_GET['erro'])){?>
                        <div>
                            <h1 class="erro">Erro ao enviar mensagem. por favor tente novamente</h1>
                            <a class ="link" href="index.php">Voltar</a>
                        </div>
                        <?} else{?>
						<div>
                            <h1 class="ok">Mensagem enviada com successo</h1>
                            <a class="link" href="index.php">Voltar</a>
                        </div>
                        <?}?>
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>