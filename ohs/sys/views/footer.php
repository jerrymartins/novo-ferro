<?php

$footer = "
<!-- footer.html -->

		<!-- rodapé -->
		<footer class='rodape'>
			<!-- container -->
			<div class='container'>
				<figure>
					<img src='ohs/pub/images/logo-branco.png' alt=' />
				</figure>
				<!-- fone -->
				<p><i class='fa fa-volume-control-phone'></i> ".OHS_TELEFONESITE."</p>
				<!-- fone fim -->

				<!-- ícones redes sociais -->
				<aside>
					<a href='#' target='facebook'><i class='fa fa-facebook'></i></a>
					<a href='#' target='google+'><i class='fa fa-google-plus'></i></a>
					<a href='#' target='instagram'><i class='fa fa-instagram'></i></a>
				</aside>
				<!-- ícones redes sociais fim -->
			</div>
			<!-- container fim -->
		</footer>
		<!-- rodapé fim -->
	</body>
		<!-- modal -->
	<style>
		.modal-body{display: block;}
		.bg-modal-sigla-estados-brasileiros{
			background-image: url(ohs/pub/images/bg-modal-sigla-estados-brasileiros.jpg);
			background-repeat: no-repeat;
			height: 454px;
		}

		.modal-body, .texte{
			display:flex;
			flex-direction: column;
			flex-wrap: wrap;
			justify-content: center;
			align-content: center;
		}

		.titulo{
			margin: 0 auto 20px auto;
			color: #fff;
		}

		.titulo:after{
			margin-top: 10px;
		}

		.btn{
			width: 226px;
			margin: 0 auto;
		}

		.modal-body .texte .form-control{
			max-width: 310px;
			margin: 0 auto 20px auto;
		}
	</style>
	<!-- modal login-->
	<div class='modal-body '>
		<div class='modal fade custom-bg-branco' id='login' tabindex='-1' role='dialog' aria-hidden='true'>
			<div class='modal-dialog modal-md' role='document'>
				<div class='modal-content bg-modal-sigla-estados-brasileiros'>
					<div class='modal-body'>
						<h1 class='modal-title titulo'>Login</h1>
						<form action='index.php' method='post' class='texte'>
							<input type='hidden' name='p' value='cadastro'>
							<input type='hidden' name='q' value='login'>

							<input type='text' name='cEmail' class='form-control' placeholder='E-mail' />
							<input type='password' name='cSenha' class='form-control' placeholder='Senha' />
							<input type='submit' name=' value='confirmar' class='btn btn-info btn-md'>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- modal fim -->

	<div class='modal-body '>
		<div class='modal fade custom-bg-branco' id='estados-brasileiros-man' tabindex='-1' role='dialog' aria-hidden='true'>
			<div class='modal-dialog modal-md' role='document'>
				<div class='modal-content bg-modal-sigla-estados-brasileiros'>
					<div class='modal-body'>
						<h1 class='modal-title titulo'>Onde você está?</h1>
						<form action='index.php' class='texte' method='POST'>
							<input type='hidden' name='p' value='index'>
							<select name='estados-brasil' class='form-control'>
								<option value='AC'>Acre</option>
								<option value='AL'>Alagoas</option>
								<option value='AP'>Amapá</option>
								<option value='AM'>Amazonas</option>
								<option value='BA'>Bahia</option>
								<option value='CE'>Ceará</option>
								<option value='DF'>Distrito Federal</option>
								<option value='ES'>Espírito Santo</option>
								<option value='GO'>Goiás</option>
								<option value='MA'>Maranhão</option>
								<option value='MT'>Mato Grosso</option>
								<option value='MS'>Mato Grosso do Sul</option>
								<option value='MG'>Minas Gerais</option>
								<option value='PA'>Pará</option>
								<option value='PB'>Paraíba</option>
								<option value='PR'>Paraná</option>
								<option value='PE'>Pernambuco</option>
								<option value='PI'>Piauí</option>
								<option value='RJ'>Rio de Janeiro</option>
								<option value='RN'>Rio Grande do Norte</option>
								<option value='RS'>Rio Grande do Sul</option>
								<option value='RO'>Rondônia</option>
								<option value='RR'>Roraima</option>
								<option value='SC'>Santa Catarina</option>
								<option value='SP'>São Paulo</option>
								<option value='SE'>Sergipe</option>
								<option value='TO'>Tocantins</option>
							</select>
							<input type='submit' name=' value='confirmar' class='btn btn-info btn-md'>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- modal fim -->
</html>
<script src='ohs/pub/js/main.js'></script>
<script src='ohs/pub/js/app.js'></script>
<script type='text/javascript'>
	//função para exibir modal de login chamada através do evento onclick
	function showModalLogin() {
		$('#login').modal('show');
	}

	//função chama chama o modal de estados novamente, para troca de estado
	function showModalStatesMan() {
		$('#estados-brasileiros-man').modal('show');
	}
</script>
";
?>