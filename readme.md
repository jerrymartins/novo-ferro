##Funcionamento Geral do Sistema
- Todos os links do sistema iniciam no arquivo raiz index.php
- A única saída possível para um método ou função é o retorno de seu valor ou o incremento da variável global $sHtml, que vai conter o *Html do sistema*. Nenhum método ou função faz saídas diretamente via *echo*, *print* ou outro meio

##Estrutura de links
- cadastrar cliente (fornecedor ou oficina): ```http://novoferro.com.br/dev/index.php?p=cadastro```
- exibir cliente : ```http://novoferro.com.br/dev/index.php?p=show&q=f&nC=28```
    - ao exibir um cliente é possível cadastrar produtos na mesma tela, além de editar dados da empresa
- listar clientes: (fornecedor ou oficina): ```http://novoferro.com.br/dev/index.php?p=show&q=f```  tipos são f,o, fo
- listar itens : ```http://novoferro.com.br/dev/index.php?p=show&q=i``` sem filtro
- listar itens por categoria: ```http://novoferro.com.br/dev/index.php?p=show&q=i&category=moto``` category : moto,carro,lancha,caminhao


##OBS
O crud está funcionando com dados sendo alterados, deletados e cadastrados.

A classe de excessões de log está configurada para gerar um arquivo de excessões em ```/ohs/sys/logs``` 

##Padrões de codificação
O código adota padrões [PSR-0][], [PSR-1][] e [PSR-2][], com essas 3 exceções:

1. por escolha, estamos adontando tabulações com tabs
2. por dúvida, não estamos removendo ```?>``` do final de arquivos que contenham apenas código PHP
3. ```@todo``` o autoload ainda não foi implementado (ver [PSR-0][])

A tradução para o português desses padrões estão em [PSR-0-pt][], [PSR-1-pt][] e [PSR-2-pt][]

###Padrões nossos para nomes:
- Nomes em **Inglês** (classes, métodos, propriedades, variáveis, constantes, etc)
- Sempre que uma variável for um **array**, o nome dela terminará com a palavra Array, ex: ```$conditionArray``` 
- Se uma variável for **inteiro**, o nome dela termina com Int, ex: ```$quantityInt```
- Se uma variável for **float**, o nome dela termina com Float, ex: ```$quantityFloat```
- Se uma variável for uma **data**, o nome dela termina com Date, ex: ```$saveDate``` ou DateT, para tipo datetime, ex: ```$logDateT``` 
- Se a variável for um **booleano**, o nome dela termina com Bool, ex: ```$updateBool``` 
- Se a variável assumir apenas os valores **0** e **1**, termina com Bool1 ex:  ```$statusBool1```
- Se a variável for uma **string**, o nome dela fica sem modificar, ex: ```$condition```


[PSR-0]: http://www.php-fig.org/psr/psr-0/
[PSR-1]: http://www.php-fig.org/psr/psr-1/
[PSR-2]: http://www.php-fig.org/psr/psr-2/

[PSR-0-pt]: https://www.webdevbr.com.br/padrao-psr-0-de-desenvolvimento-php-criar-um-autoloader
[PSR-1-pt]: https://www.webdevbr.com.br/padrao-psr-1-de-desenvolvimento-php-o-minimo-para-uma-boa-comunicacao-entre-codigos-php-diferentes/
[PSR-2-pt]: https://www.webdevbr.com.br/padrao-psr-2-de-desenvolvimento-php-ampliando-a-capacidade-de-comunicacao-entre-diferentes-codigos-php/
