<?php

$templateString = " 
      <!-- cabeçalho fim --><!-- conteúdo -->
      <main class='conteudo quem-somos'>
        <!-- container -->
        <div class='container'>
           <!-- linha -->
           <div class='linha'>
              <h1 class='titulo'>Conheça a NOVO FERRO</h1>
              <!-- titulo fim -->
           </div>
           <!-- linha fim --><!-- linha -->
           <div class='linha'>
              <!-- coluna esquerda -->
              <div class='col-esq'>
                  $data
              </div>
              <!-- coluna esquerda fim --><!-- coluna direita -->
              <div class='col-dir'>
                 <picture>
                    <source media='(max-width: 767px)' srcset='ohs/pub/images/homem-quem-somos-mobile.jpg'>
                    <img srcset='ohs/pub/images/homem-quem-somos-desktop.jpg' alt=''>
                 </picture>
              </div>
              <!-- coluna direita fim -->
           </div>
           <!-- linha fim -->
        </div>
        <!-- container fim -->
        ";

?>