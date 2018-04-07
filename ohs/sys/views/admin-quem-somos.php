<?php
$templateString = "
		<form class='form-custom cadastre-se' action='index.php' method='post'>
			<input type='hidden' name='p' value='admin'>
			<input type='hidden' name='q' value='quem-somos-update'>
			<!-- título -->
			<h1 class='titulo'>Atualize página quem-somos</h1>
			<!-- titulo fim -->

			<!-- linha -->
			<div class='linha'>
				<!-- coluna esquerda -->
				<div class='col-esq'>
					<div class='form-group'>
						<label class='sr-only'>Titulo:</label>
						<input type='text' name='pTitle' class='form-control' placeholder='Titulo' value='{$data['pTitle']}'>
					</div>
				</div>
				<!-- coluna esquerda fim -->
				
			</div>
			<!-- linha fim -->
			
			<!-- linha -->
			<div class='linha'>
				<!-- coluna esquerda -->
				<div class='col-esq'>
					<div class='form-group'>
						<label class='sr-only'>Descrição:</label>
						<input type='text' name='pDescription' class='form-control' placeholder='Descrição' value='{$data['pDescription']}'>
					</div>
				</div>
				<!-- coluna esquerda fim -->
			
			</div>
			<!-- linha fim -->

			<div class='linha'>
				<!-- coluna esquerda -->
				<div class='col-esq'>
					<div class='form-group'>
						<label class='sr-only'>Palavras-Chave:</label>
						<input type='text' name='pKeywords' class='form-control' placeholder='Palavras Chave' value='{$data['pKeywords']}'>
					</div>
				</div>
				<!-- coluna esquerda fim -->
			</div>
			<!-- linha fim -->	

			<div class='linha'>
				<!-- coluna esquerda -->
				<div class='col-esq'>
					<div class='form-group'>
						<label class='sr-only'>Palavras-Chave:</label>
						<textarea rows='4' cols='50' name='pContent' class='form-control'>{$data['pText']}</textarea>
					</div>
				</div>
				<!-- coluna esquerda fim -->
			
			</div>
			<!-- linha fim -->
			
			<!-- botão enviar -->
			<div class='linha'>
				<div class='col-esq'>
					<div class='form-group'>
						<input type='submit' value='Atualizar' class='btn btn-info btn-lg' />
					</div>
				</div>
			</div>
			<!-- botão enviar fim -->
		</form>
		";
?>