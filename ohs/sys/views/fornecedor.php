<?php
/*
echo "<pre>";
var_dump($data);
die("</pre>");
*/

$item = "";

$modalEditItem = "";


$selectCarro = "";
$selectMoto = "";
$selectLancha = "";
$selectCaminhao = "";

foreach ($data["selectSubCat"] as $key => $value) {
    
    if ($key == 'carro') {
        $selectCarro = $value;
    } else if ($key == 'moto') {
        $selectMoto = $value;
    } else if ($key == 'lancha') {
        $selectLancha = $value;
    } else if ($key == 'caminhao') {
        $selectCaminhao = $value;
    }
}

//se o cliente tem algum produto cadastrado
if(count($data['item']) != 0) {
    //existe um item no array que não é produto, portanto deve-se subtrair 1 do tamanho do array, e o total de itens encontrados
    for ($i=0; $i < count($data['item']) - 1; $i++) {
        $urlImage = $data['item'][$i]['iPasta'].'/'.$data['item'][$i]['iImagem'];

        if (!$data['item'][$i]['iImagem']) {
            $urlImage = 'foto-padrao.png';
        }

        switch ($data['item'][$i]["iCategoria"]) {
        	case 'carro':

        		if ($data['item'][$i]["iEstado"] == "novo") {
        			$checkedNovo = "checked";
        		} else {
        			$checkedUsado = "checked";
        		}

        		$checkedCarro = "selected";
        		
        		break;

        	case 'moto':
        		if ($data['item'][$i]["iEstado"] == "novo") {
        			$checkedNovo = "checked";
        		} else {
        			$checkedUsado = "checked";
        		}

        		$checkedMoto = "selected";

        		break;

        	case 'lancha':
        		if ($data['item'][$i]["iEstado"] == "novo") {
        			$checkedNovo = "checked";
        		} else {
        			$checkedUsado = "checked";
        		}

        		$checkedLancha = "selected";

        		break;

        	case 'caminhao':
        		if ($data['item'][$i]["iEstado"] == "novo") {
        			$checkedNovo = "checked";
        		} else {
        			$checkedUsado = "checked";
        		}

        		$checkedCaminhao = "selected";

        		break;
        }
        

        $item .= "
            <div class='bloco'>
               <article>
                    <figure>
                        <img src='ohs/data/images/{$urlImage}' alt='' />
                    </figure>
                
                <div class='bloco'>
                    <hgroup>
                        <h1>{$data['item'][$i]['iTitulo']}</h1>
                        <h2>R$ {$data['item'][$i]['iPreco']}</h2>
                    </hgroup>

                    <div class='bts'>
                        <strong><i class='fa fa-pencil' data-toggle='modal' data-target='#ModalEdit-{$i}'></i></strong>
                        <a href='index.php?p=item&q=delete&nI={$data['item'][$i]['nItem']}'><i class='fa fa-times'></i></a>
                    </div>
                </div>
                </article>
            </div>
        ";

        $modalEditItem .= "
                    <!-- modal -->
                        <div class='modal-body'>
                            <div class='modal fade' id='ModalEdit-{$i}' tabindex='-1' role='dialog' aria-hidden='true'>
                                <div class='modal-dialog modal-lg' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>        
                                           <div class='bloco'>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>fechar | &times;</span>
                                                </button>
                                            </div>
                                            <h1 class='modal-title titulo'>Editar Produto</h1>
                                        </div>
                                        <div class='modal-body'>
                                            <!-- linha -->
                                            <div class='linha'>
                                                <!-- coluna meio -->
                                                <div class='col-meio-modal'>
                                                    
                                                    <form class='form-custom' method='POST' action='index.php' enctype='multipart/form-data'>
                                                        <input type='hidden' name='p' value='item'>
                                                        <input type='hidden' name='q' value='update'>
                                                        <input type='hidden' name='nI' value='{$data['item'][$i]['nItem']}'>
                                                       <!-- linha novo ou usado -->
                                                        <div class='linha'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <label class='form-check-label'>
                                                                        <input class='form-check-input' type='radio' name='iEstado' id='inlineRadio1' value='novo' $checkedNovo> Novo
                                                                    </label>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <label class='form-check-label'>
                                                                        <input class='form-check-input' type='radio' name='iEstado' id='inlineRadio1' value='seminovo' $checkedUsado> Usado
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha novo ou usado fim -->
                                                        
                                                        <!-- linha categoria e sub-categoria -->
                                                        <div class='linha desktop'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                	<input type='hidden' value='' id='selected{$i}'/>
                                                                    <select class='form-control form-control' id='iCategoria{$i}' name='iCategoria' onchange='selectSubCatModal(this);'>
                                                                        <option value=''>categoria</option>
                                                                        <option value='carro' $checkedCarro >carro</option>
                                                                        <option value='moto' $checkedMoto >moto</option>
                                                                        <option value='lancha' $checkedLancha >lancha</option>
                                                                        <option value='caminhao' $checkedCaminhao >caminhão</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class='col-dir'>
                                                                <div class='form-group' id='selectSub'>
                                                                    
                                                                    <div id='divSubCatSelect{$i}'>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha categoria e sub-categoria fim -->
                                                        
                                                        <!-- linha produto e valor -->
                                                        <div class='linha desktop'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <input type='text' class='form-control' placeholder='Nome do produto' name='iTitulo' value='{$data['item'][$i]['iTitulo']}'/>
                                                                </div>
                                                            </div>
                                                            <div class='col-dir'>
                                                                <div class='form-group'>
                                                                    <input type='text' class='form-control' placeholder='Valor R$' name='iPreco' value='{$data['item'][$i]['iPreco']}'/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha produto e valor fim -->
                                                        
                                                        <!-- linha carregar imagem do produto -->
                                                        <div class='linha'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <label class='custom-file'>
                                                                        <input type='file' id='file' name='imageItem' class='custom-file-input'>
                                                                        <span class='custom-file-control br'><i class='fa fa-upload' aria-hidden='true'></i></span>
                                                                    </label> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha carregar imagem do produto -->
                                                        
                                                        <!-- linha cadastrar -->
                                                        <div class='linha'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <input type='submit' class='btn btn-info' value='Atualizar' />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha cadastrar -->
                                                    </form>

                                                    <!-- selects para as categorias -->
                                                    <div style='display:none;'>
                                                        $selectCarro
                                                        $selectMoto
                                                        $selectLancha
                                                        $selectCaminhao
                                                    </div>

                                                </div>
                                                <!-- coluna meio fim -->
                                            </div>
                                            <!-- linha fim -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- modal fim -->";
    }  
} else {
    $item = "<p class='frase'>Nenhum produto cadastrado</p>";
}

$templateString = "
    <!-- conteúdo -->
    <main class='conteudo fornecedor'>
        <!-- container -->
        <div class='container'>
            <!-- linha -->
            <div class='linha'>                
                <!-- dados do fornecedor -->
                <div class='dados-fornecedor'>
                    <!-- logo -->
                    <figure><img src='http://via.placeholder.com/260x215' /></figure>
                    <!-- logo fim -->
                    
                    <!-- dados cadastrais -->
                    <article>
                        <h1 class='titulo'>{$data[0]['cRazaoSocial']}</h1>
                         <ul>
                            <li>CNPJ: {$data[0]['cCpfCnpj']}</li>
                            <li><i class='fa fa-volume-control-phone' aria-hidden='true'></i> <strong>{$data[0]['tel']}</strong></li>
                            <li><i class='fa fa-envelope-o' aria-hidden='true'></i>{$data[0]['cEmail']}</li>
                            <li><i class='fa fa-map-marker' aria-hidden='true'></i> <p>{$data[0]['address']}</p></li>
                        </ul>
                    </article>
                    <!-- dados cadastrais fim -->
                    
                    <!-- botão editar -->
                    <div class='bt-editar'>
                        <a href='index.php?p=cadastro&q=edit&nC={$data['nc']}' class='btn btn-info'><i class='fa fa-pencil' aria-hidden='true'></i> Editar dados da empresa</a>
                    </div>
                    <!-- botão editar fim -->
                </div>
                <!-- dados do fornecedor fim -->
                
                <!-- mapa -->
                $templateStringMap
                <!-- mapa fim -->
                
                <!-- produtos cadastrados -->
                <section class='produtos-cadastrados'>
                    <div class='linha'>
                        <h1 class='titulo'>Produtos cadastrados</h1>
                        <div class='bt-editar'>
                            <a href='' class='btn btn-info' data-toggle='modal' data-target='#Modal-1'><i class='fa fa-pencil-square-o'></i> Cadastrar Novo Produto</a>
                        </div> 
                    </div>
                    <!-- listagem de produtos cadastrados -->
                    <div class='linha'>
                        $item
                    </div>
                    <!-- listagem de produtos cadastrados fim -->
                    
                    <!-- modal -->
                        <div class='modal-body'>
                            <div class='modal fade' id='Modal-1' tabindex='-1' role='dialog' aria-hidden='true'>
                                <div class='modal-dialog modal-lg' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>        
                                           <div class='bloco'>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>fechar | &times;</span>
                                                </button>
                                            </div>
                                            <h1 class='modal-title titulo'>Cadastrar produtos</h1>
                                        </div>
                                        <div class='modal-body'>
                                            <!-- linha -->
                                            <div class='linha'>
                                                <!-- coluna meio -->
                                                <div class='col-meio-modal'>
                                                    
                                                    <form class='form-custom' method='POST' action='index.php' enctype='multipart/form-data'>
                                                        <input type='hidden' name='p' value='item'>
                                                        <input type='hidden' name='q' value='save'>
                                                        <input type='hidden' name='nC' value='{$nC}'>
                                                       <!-- linha novo ou usado -->
                                                        <div class='linha'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <label class='form-check-label'>
                                                                        <input class='form-check-input' type='radio' name='iEstado' id='inlineRadio1' value='novo'> Novo
                                                                    </label>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <label class='form-check-label'>
                                                                        <input class='form-check-input' type='radio' name='iEstado' id='inlineRadio1' value='seminovo'> Usado
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha novo ou usado fim -->
                                                        
                                                        <!-- linha categoria e sub-categoria -->
                                                        <div class='linha desktop'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <select class='form-control form-control' id='iCategoria' name='iCategoria' onchange='selectSubCat();'>
                                                                        <option value=''>categoria</option>
                                                                        <option value='carro'>carro</option>
                                                                        <option value='moto'>moto</option>
                                                                        <option value='lancha'>lancha</option>
                                                                        <option value='caminhao'>caminhão</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class='col-dir'>
                                                                <div class='form-group' id='selectSub'>
                                                                    
                                                                    <div id='divSubCatSelect'>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha categoria e sub-categoria fim -->
                                                        
                                                        <!-- linha produto e valor -->
                                                        <div class='linha desktop'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <input type='text' class='form-control' placeholder='Nome do produto' name='iTitulo'/>
                                                                </div>
                                                            </div>
                                                            <div class='col-dir'>
                                                                <div class='form-group'>
                                                                    <input type='text' class='form-control' placeholder='Valor R$' name='iPreco'/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha produto e valor fim -->
                                                        
                                                        <!-- linha carregar imagem do produto -->
                                                        <div class='linha'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <label class='custom-file'>
                                                                        <input type='file' id='file' name='imageItem' class='custom-file-input'>
                                                                        <span class='custom-file-control br'><i class='fa fa-upload' aria-hidden='true'></i></span>
                                                                    </label> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha carregar imagem do produto -->
                                                        
                                                        <!-- linha cadastrar -->
                                                        <div class='linha'>
                                                            <div class='col-esq'>
                                                                <div class='form-group'>
                                                                    <input type='submit' class='btn btn-info' value='Cadastrar' />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- linha cadastrar -->
                                                    </form>

                                                    <!-- selects para as categorias -->
                                                    <div style='display:none;'>
                                                        $selectCarro
                                                        $selectMoto
                                                        $selectLancha
                                                        $selectCaminhao
                                                    </div>

                                                </div>
                                                <!-- coluna meio fim -->
                                            </div>
                                            <!-- linha fim -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- modal fim -->

                    <!-- model edita item -->
                    $modalEditItem
                    <!-- fim modal edita item -->
                </section>
                <!-- produtos cadastrados fim -->
            </div>
            <!-- linha fim -->
        </div>
        <!-- container fim -->
    </main>
    <!-- conteúdo fim -->
    <script>
        //categoria atualmente selecionada
        var catNome;
        //categoria selecionada anteriormente
        var catNomeAnt;

        function selectSubCat() {

            catNomeAnt = catNome;
            catNome = document.getElementById('iCategoria').value;

            //div que irá conter o select subcategorias
            var subCat = document.getElementById('divSubCatSelect');

            var select = document.getElementById(catNome);

            var selectAnt;
            
            if(catNomeAnt) {
                var selectAnt = document.getElementById(catNomeAnt);
                console.log(selectAnt);
                console.log('deve remover '+ catNomeAnt);
                subCat.removeChild(selectAnt);
            }

            select = document.getElementById(catNome);

            subCat.appendChild(select);


        }

        //categoria atualmente selecionada em um dos modals
        var catNomeModal;
        //categoria selecionada anteriormente
        var catNomeAntModal;

        var id;
        var idAnt;

        function selectSubCatModal(el) {
        	idAnt = id;
        	console.log(el.value);
        	console.log(el.id.split(''));

        	id = el.id.split('');

        	id.splice(0,10);

        	id = id.toString();


        	catNomeAntModal = catNomeModal;
            catNomeModal = document.getElementById('iCategoria'+id).value;

            //div que irá conter o select subcategorias
            var subCat = document.getElementById('divSubCatSelect'+id);
        	
        	var select = document.getElementById(catNomeModal);

        	console.log(id);
        	console.log(idAnt);

        	if(catNomeAntModal && idAnt == id) {
                var selectAnt = document.getElementById(catNomeAntModal);
                console.log(selectAnt);
                console.log('deve remover '+ catNomeAntModal);
                subCat.removeChild(selectAnt);
            }

            select = document.getElementById(catNomeModal);

            subCat.appendChild(select);
        }
    </script>
    ";

?>