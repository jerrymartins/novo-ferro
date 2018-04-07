<?php

$templateString = "
		<!-- cadastre-se -->
		<form class='form-custom cadastre-se' action='index.php' method='post'>
			<input type='hidden' name='p' value='cadastro'>
			<input type='hidden' name='q' value='{$q}'>
			<input type='hidden' name='nC' value='{$nC}'>
			<!-- título -->
			<h1 class='titulo'>Preencha os campos abaixo para cadastro</h1>
			<!-- titulo fim -->

			<!-- linha -->
			<div class='linha'>
				<!-- coluna esquerda -->
				<div class='col-esq'>
					<div class='form-group'>
						<label class='sr-only'>E-mail:</label>
						<input type='email' name='cEmail' class='form-control' placeholder='E-mail' value='{$data['cEmail']}'>
					</div>
				</div>
				<!-- coluna esquerda fim -->
				<!-- coluna meio -->
				<div class='col-meio'>
					<div class='form-group'>
						<label class='sr-only'>Senha:</label>
						<input type='password' name='cSenha' class='form-control' placeholder='Senha' >
					</div>
				</div>
				<!-- coluna meio fim -->
				<!-- coluna direita -->
				<div class='col-dir'>
					<div class='form-group'>
						<label class='sr-only'>Confirmar sua senha:</label>
						<input type='password' name='cSenhaConfirm' class='form-control' placeholder='Confirmar sua senha' >
					</div>
				</div>
				<!-- coluna direita fim -->
			</div>
			<!-- linha fim -->
			
			<!-- linha -->
			<div class='linha'>
				<!-- coluna esquerda -->
				<div class='col-esq'>
					<div class='form-group'>
						<label class='sr-only'>Razão social da empresa:</label>
						<input type='text' name='cRazaosocial' class='form-control' placeholder='Razão social da empresa' value='{$data['cRazaoSocial']}'>
					</div>
				</div>
				<!-- coluna esquerda fim -->
				<!-- coluna meio -->
				<div class='col-meio'>
					<div class='form-group'>
						<label class='sr-only'>CNPJ:</label>
						<input type='text' name='cCpfCnpj' class='form-control' placeholder='CNPJ' value='{$data['cCpfCnpj']}'>
					</div>
				</div>
				<!-- coluna meio fim -->
				<!-- coluna direita -->
				<div class='col-meio'>
					<div class='form-group'>
						<label class='sr-only'>Inscrição estadual:</label>
						<input type='text' name='cInscricaoEstadual' class='form-control' placeholder='Inscrição estadual' value='{$data['cInscricaoEstadual']}'>
					</div>
				</div>
				<!-- coluna direita fim -->
			</div>
			<!-- linha fim -->

			<!-- linha -->
			<div class='linha'>
				<!-- coluna direita -->
				<div class='col-esq'>
					<div class='form-group tamanho04'>
						<label class='sr-only'>DDD:</label>
						<input type='text' name='cDDDTel' class='form-control' placeholder='DDD' value='{$data['cDDDTel']}'>
					</div>
					<div class='form-group tamanho08'>
						<label class='sr-only'>Telefone:</label>
						<input type='text' name='cTelefone' class='form-control' placeholder='Telefone' value='{$data['cTelefone']}'>
					</div>
				</div>
				<!-- coluna direita fim -->
				<!-- coluna esquerda -->
				<div class='col-dir'>
					<div class='form-group tamanho04'>
						<label class='sr-only'>DDD:</label>
						<input type='text' name='cDDDCel' class='form-control' placeholder='DDD' value='{$data['cDDDCel']}'>
					</div>
					<div class='form-group tamanho08'>
						<label class='sr-only'>Celular:</label>
						<input type='text' name='cCelular' class='form-control' placeholder='Celular' value='{$data['cCelular']}'>
					</div>
				</div>
				<!-- coluna esquerda fim -->
			</div>
			<!-- linha fim -->

			<!-- linha -->
			<div class='linha desktop'>
				<div class='col-esq'>
					<div class='form-group'>
						<label class='sr-only'>Responsável:</label>
						<input type='text' name='cResponsavel' class='form-control' placeholder='Responsável' value='{$data['cResponsavel']}' />
					</div>
				</div>
			</div>
			<!-- linha fim -->

			<!-- linha -->
			<div class='linha'>
				<div class='col-esq col-12'>
					<div class='form-group'>
						<label class='form-check-label'>
						<input class='form-check-input' name='cCheckBoxF' type='checkbox' value='f' {$data['checkedF']} />
						</label>
						<a href='#' class='custom-control-description'>Eu sou Fornecedor.</a>&nbsp;&nbsp;&nbsp;

						<label class='form-check-label'>
							<input class='form-check-input' name='cCheckBoxO' type='checkbox' value='o' {$data['checkedO']} />
							</label>
							<a href='#' class='custom-control-description'>Eu sou Oficina.</a>
					</div>
				</div>
			</div>
			<!-- linha fim -->
		
			
			<h1 class='titulo'>Endereço de cadastro</h1>
			
			<!-- linha -->
			<div class='linha desktop'>
				<!-- coluna direita -->
				<div class='col-esq'>
					<div class='form-group tamanho04'>
						<label class='sr-only'>Estados Brasileiros:</label>
						
						{$data['cEstado']}
						
					</div>
					<div class='form-group tamanho08'>
						<label class='sr-only'>Cidade:</label>
						<input type='text' name='cCidade' class='form-control' placeholder='Cidade' value='{$data['cCidade']}'>
					</div>
				</div>
				<!-- coluna direita fim -->
				<!-- coluna esquerda -->
				<div class='col-dir'>
					<div class='form-group tamanho08'>
						<label class='sr-only'>Endereço:</label>
						<input type='text' name='cRua' class='form-control' placeholder='Endereço' value='{$data['cRua']}'>
					</div>
					<div class='form-group tamanho04'>
						<label class='sr-only'>Nº:</label>
						<input type='text' name='cNumero' class='form-control' placeholder='Nº' value='{$data['cNumero']}'>
					</div>
				</div>
				<!-- coluna esquerda fim -->
			</div>
			<!-- linha fim -->
			
			<!-- linha -->
			<div class='linha desktop'>
				<!-- coluna direita -->
				<div class='col-esq'>
					<div class='form-group tamanho12'>
						<label class='sr-only'>Bairro:</label>
						<input type='text' name='cBairro' class='form-control' placeholder='Bairro' value='{$data['cBairro']}'>
					</div>
				</div>
				<!-- coluna direita fim -->
				<!-- coluna esquerda -->
				<div class='col-dir'>
					<div class='form-group tamanho04'>
						<label class='sr-only'>CEP:</label>
						<input type='text' name='cCep' class='form-control' placeholder='CEP' value='{$data['cCep']}'>
					</div>
					<div class='form-group tamanho08'>
						<label class='sr-only'>Ponto de referência:</label>
						<input type='text' name='cPontoReferencia' class='form-control' placeholder='Ponto de referência' value='{$data['cPontoReferencia']}'>
					</div>
				</div>
				<!-- coluna esquerda fim -->
			</div>
			<!-- linha fim -->
			
			<!-- linha -->
			<div class='linha'>
				<div class='col-esq col-12'>
					<div class='form-group'>
						<label class='form-check-label'>
						<input class='form-check-input' name='cCheckBoxAccept' type='checkbox' value='s'>
						</label>
						<a href='#' class='custom-control-description'>Eu li e Concordo com o Termos de Uso e Políticas de Privacidade.</a>
					</div>
				</div>
			</div>
			<!-- linha fim -->

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
		";
?>