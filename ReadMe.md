# Lazy Sass PHP

Projeto simples para compilar arquivos Sass e SCSS, além de incluir Compass v3.1.

## Projeto Original

Este projeto é uma particularidade do PHamlP - PHP port of Haml and Sass
http://code.google.com/p/phamlp/

## Utilizado
- Primeiramente você precisará de um servidor local em php, tipo... XAMPP, WAMPP, EasyPHP
- Segundo, você precisa estar acostumado a rodar o servidor local, tipo... digitar no navegador http://localhost e funcionar
- depois é só ir na sua pasta onde se encontra o diretório css e colocar os arquivos deste projeto próximos á ela

exemplo:
<pre>
    meu_projeto/
        css/
        phamlp/
        sass/
            _variaveis.scss
            estilos.scss
        javascript/
        img/
        index.php
        sass.php
</pre>

## Transformando os arquivos da pasta sass para css

Se suas pastas estiverem parecidas com o exemplo acima, basta chamar <b>http://localhost/meu_projeto/sass.php</b> e pronto! <br/>
Ele irá buscar o estilos.scss e transformar ele em <b>estilos.css</b> dentro da pasta css.

# Dicas

Se você quiser agilizar e reaproveitar a biblioteca para outros projetos, basta:
jogar a pasta <b>phamlp</b> para um nível de pasta anterior
abrir o arquivo <b>sass.php</b> e trocar
<pre>
$lib = "./phamlp";
</pre>
para
<pre>
$lib = "<b>..</b>/phamlp";
</pre>
para não ter que ficar acessando toda hora http://localhost/meu_projeto/sass.php você poderia abrir o seu index.php e incluir logo no início:<br/>
<pre lang="php">
&lt;?php
include "sass.php";
?&gt;
</pre>
Caso você não queira que apareça as mensagens de saída do compilador, basta desativar a flag <b>$output</b>
<pre lang="php">
&lt;?php
$output=false;//tem que ser antes de chamar o compilador
include "sass.php";//o cara que vai procurar seus arquivos nas devidas pastas
.
.
.
?&gt;
</pre>
## Referências

- http://code.google.com/p/phamlp/
- http://sass-lang.com/
- http://compass-style.org/

## Alterando o Dreameaver para aceitar extenssões como se fossem CSS normais

- Vá até a pasta onde você instalou seu Dreamweaver, ex: C:/Arquivos de programas/Adobe/Adobe Dreamweaver CS3/
- entre na pasta configuration/DocumentTypes
- abra o arquivo MMDocumentTypes.xml
- procure pelo trecho:
<pre>
&lt;documenttype id="CSS" internaltype="Text" winfileextension="css" macfileextension="css" file="Default.css" writebyteordermark="false"&gt;
        &lt;TITLE&gt;
                &lt;MMString:loadString id="mmdocumenttypes_30" /&gt;
        &lt;/TITLE&gt;
        &lt;description&gt;
                &lt;MMString:loadString id="mmdocumenttypes_31" /&gt;
        &lt;/description&gt;
&lt;/documenttype&gt;
</pre>
- inclua a extensão less juntamente com a extensão css, de forma que fique assim:
<pre>
&lt;documenttype id="CSS" internaltype="Text" <b>winfileextension="css,less,sass,scss,sassc" macfileextension="css,less,sass,scss,sassc"</b> file="Default.css" writebyteordermark="false"&gt;
        &lt;TITLE&gt;
                &lt;MMString:loadString id="mmdocumenttypes_30" /&gt;
        &lt;/TITLE&gt;
        &lt;description&gt;
                &lt;MMString:loadString id="mmdocumenttypes_31" /&gt;
        &lt;/description&gt;
&lt;/documenttype&gt;
</pre>