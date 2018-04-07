<?php

$fonteContato = str_replace(' | ', "<br>", OHS_TELEFONESITE);

$templateString = "
		<!-- conteúdo -->
		<main class='conteudo'>
			<!-- container -->
			<div class='container'>
				<!-- linha -->
				<div class='linha'>
	
					<!-- coluna esquerda -->
					<div class='contato-col-esq'>
						<!-- cadastre-se -->
						<form class='form-custom'>
							<!-- título -->
							<h1 class='titulo'>Entre em contato preencha os campos abaixo</h1>
							<!-- titulo fim -->

							<!-- nome e email-->
							<div class='linha desktop'>
								<!-- coluna direita -->
								<div class='col-esq'>
									<div class='form-group'>
										<label class='sr-only'>Nome:</label>
										<input type='text' class='form-control' placeholder='Nome' />
									</div>
								</div>
								<!-- coluna direita fim -->
								<!-- coluna esquerda -->
								<div class='col-dir'>
									<div class='form-group'>
										<label class='sr-only'>E-mail:</label>
										<input type='email' class='form-control' placeholder='Email' />
									</div>
								</div>
								<!-- coluna esquerda fim -->
							</div>
							<!-- nome e email fim -->

							<!-- DDD, telefone, sigla e cidade -->
							<div class='linha desktop'>
								<!-- coluna direita -->
								<div class='col-esq'>
									<div class='form-group tamanho06'>
										<label class='sr-only'>DDD:</label>
										<input type='text' class='form-control' placeholder='DDD' />
									</div>
									<div class='form-group tamanho06'>
										<label class='sr-only'>Telefone:</label>
										<input type='text' class='form-control' placeholder='Telefone' />
									</div>
								</div>
								<!-- coluna direita fim -->
								<!-- coluna esquerda -->
								<div class='col-dir'>
									<!-- sigla e cidades -->
									<div class='form-group tamanho06'>
										<label class='sr-only'>Estados Brasileiros:</label>
										<select name='estados-brasil' class='form-control'>
										<option value='AC'>AC</option>
										<option value='AL'>AL</option>
										<option value='AP'>AP</option>
										<option value='AM'>AM</option>
										<option value='BA'>BA</option>
										<option value='CE'>CE</option>
										<option value='DF'>DF</option>
										<option value='ES'>ES</option>
										<option value='GO'>GO</option>
										<option value='MA'>MA</option>
										<option value='MT'>MT</option>
										<option value='MS'>MS</option>
										<option value='MG'>MG</option>
										<option value='PA'>PA</option>
										<option value='PB'>PB</option>
										<option value='PR'>PR</option>
										<option value='PE'>PE</option>
										<option value='PI'>PI</option>
										<option value='RJ'>RJ</option>
										<option value='RN'>RN</option>
										<option value='RS'>RS</option>
										<option value='RO'>RO</option>
										<option value='RR'>RR</option>
										<option value='SC'>SC</option>
										<option value='SP'>SP</option>
										<option value='SE'>SE</option>
										<option value='TO'>TO</option>
									</select>
									</div>
									<!-- sigla e cidades fim -->
									<!-- cidade -->
									<div class='form-group tamanho06'>
										<label class='sr-only'>Cidade:</label>
										<input type='text' class='form-control' placeholder='Cidade' />
									</div>
									<!-- cidade fim -->
								</div>
								<!-- coluna esquerda fim -->
							</div>
							<!-- DDD, telefone, sigla e cidade -->

							<!-- assunto -->
							<div class='linha'>
								<div class='col-esq'>
									<div class='form-group'>
										<label class='sr-only'>Assunto:</label>
										<input type='text' class='form-control' placeholder='Assunto' />
									</div>
								</div>
							</div>
							<!-- assunto fim -->

							<!-- mensagem -->
							<div class='linha'>
								<div class='col-esq'>
									<div class='form-group'>
										<label class='sr-only'>Mensagem:</label>
										<textarea class='form-control' placeholder='Mensagem'></textarea>
									</div>
								</div>
							</div>
							<!-- mensagem fim -->

							<!-- botão enviar -->
							<div class='linha'>
								<div class='col-esq'>
									<div class='form-group'>
										<input type='submit' value='Enviar' class='btn btn-info btn-lg' />
									</div>
								</div>
							</div>
							<!-- botão enviar fim -->
						</form>
						<!-- cadastre-se fim -->
					</div>
					<!-- coluna esquerda fim -->

					<!-- coluna direita -->
					<div class='contato-col-dir'>
						<article>
							<h1 class='titulo'>Ligue-nos</h1>
							<p>$fonteContato</p>
						</article>
						
						<article>
							<h1 class='titulo'>Acompanhe-nos</h1>
							<a href='#' target='facebook'><i class='fa fa-facebook'></i></a>
							<a href='#' target='google+'><i class='fa fa-google-plus'></i></a>
							<a href='#' target='instagram'><i class='fa fa-instagram'></i></a>
						</article>
						
						<img src='ohs/pub/images/homem.png'  class='homem' alt='' />
					</div>
					<!-- coluna direita fim -->
				</div>
				<!-- linha fim -->
			</div>
			<!-- container fim -->
		</main>
		<!-- conteúdo fim -->
		";
?>