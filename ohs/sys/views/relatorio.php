<?php
$oficinas = "";
$itens = "";

/*
echo "<pre>";
var_dump($data);
die("</pre>");
*/

/*
echo "<pre>";
var_dump($data['itens']);
die("</pre>");
*/


for ($i=0; $i < count($data["oficinas"]); $i++) {
    $oficinas .= "

            <article>
                <div class='col-esq'>
                    <figure><img src='http://via.placeholder.com/350x150' alt='' /></figure>
                </div>
                <div class='col-meio'>
                   <!-- nome -->
                   <h1 class='titulo'>{$data['oficinas'][$i][0]['cRazaoSocial']}</h1>
                   <!-- nome fim -->
                    <ul>
                        <li><i class='fa fa-volume-control-phone'></i> <strong>{$data['oficinas'][$i][0]['cDDDTel']} {$data['oficinas'][$i][0]['cTelefone']}  {$data['oficinas'][$i][0]['cCelular']}</strong></li>
                        <li><i class='fa fa-envelope-o'></i> {$data['oficinas'][$i][0]['cEmail']}</li>
                        <li><i class='fa fa-map-marker'></i>{$data['oficinas'][$i][0]['cRua']}, {$data['oficinas'][$i][0]['cNumero']} - {$data['oficinas'][$i][0]['cBairro']} {$data['oficinas'][$i][0]['cPontoReferencia']} {$data['oficinas'][$i][0]['cCidade']} / {$data['oficinas'][$i][0]['cEstado']} - CEP: {$data['oficinas'][$i][0]['cCep']}</li>
                    </ul>
                </div>
                <div class='col-dir'>
                    <a href='index.php?p=relatorio&q=remove&nC={$data['oficinas'][$i][0]['nCadastro']}' class='delete'>Excluir &nbsp;&nbsp; | &nbsp;&nbsp;<i class='fa fa-times'></i></a>
                </div>
            </article>

    ";
}

for ($k=0; $k < count($data["itens"]); $k++) {
    $urlImage = $data['itens'][$k][0]['iPasta'].'/'.$data['itens'][$k][0]['iImagem'];

    if (!$data['itens'][$k][0]['iImagem']) {
        $urlImage = 'foto-padrao.png';

    }

    $itens .= "
        <article>
            <div class='col-esq-descricao'>
                <figure><img src='ohs/data/images/$urlImage' alt='' /></figure>
                <hgroup>
                    <h1>{$data['itens'][$k][0]['iTitulo']}</h1>
                    <h2>R$ {$data['itens'][$k][0]['iPreco']}</h2>
                </hgroup>
            </div>
            <div class='col-meio-descricao'>
               <!-- nome -->
               <h1 class='titulo'>Rafael Henrique Trindade</h1>
               <!-- nome fim -->
                <ul>
                    <li><i class='fa fa-volume-control-phone'></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                    <li><i class='fa fa-envelope-o'></i> contato@abreumotopecas.com.br</li>
                    <li><i class='fa fa-map-marker'></i>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</li>
                </ul>
            </div>
            <div class='col-dir'>
                <a href='index.php?p=relatorio&q=remove&nI={$data['itens'][$k][0]['nItem']}' class='delete'>Excluir &nbsp;&nbsp; | &nbsp;&nbsp;<i class='fa fa-times'></i></a>
            </div>
        </article>
        ";
}

//$itens = ""; /** DESCOMENTAR ESTA LINHA PARA EXIBIR OS ITENS" **/

$templateString = "
	<!-- conteúdo -->
	<main class='conteudo relatorio'>
		<!-- container -->
		<div class='container'>
			<!-- linha -->
			<div class='linha'>
				<!-- migalha de pão fim -->
				
				<!-- coluna topo -->
                <header class='col-topo'>
                    <!-- titulo -->
                    <h1 class='titulo'>Imprima o Relatório</h1>
                    <!-- titulo fim -->

                    <!-- ícones listagem -->
                    <ul class='icones'>
                        <li><a href='#'><i class='fa fa-print'></i> Imprimir</a></li>
                        <li><a href='#'><i class='fa fa-download'></i> Salvar</a></li>
                    </ul>
                    <!-- ícones listagem fim -->
                </header>
                <!-- coluna topo fim -->

			    <!-- listagem -->
			    <div class='listagem-relatorio'>
			        <div class='linha'>
                    $itens
                    $oficinas
                    </div>
			    </div>
			    <!-- listagem -->
               
                <!-- paginação fim -->
                <nav class='paginacao'>
                    <ul>
                        <li><a href='#'><i class='fa fa-angle-double-left'></i></a></li>
                        <li><a href='#' class='ativo'>1</a></li>
                        <li><a href='#'>2</a></li>
                        <li><a href='#'>3</a></li>
                        <li><a href='#'>4</a></li>
                        <li><a href='#'>5</a></li>
                        <li><a href='#'><i class='fa fa-angle-double-right'></i></a></li>
                    </ul>
                </nav>
                <!-- paginação fim -->
			</div>
			<!-- linha fim -->
		</div>
		<!-- container fim -->
	</main>
	<!-- conteúdo fim -->
    ";
?>