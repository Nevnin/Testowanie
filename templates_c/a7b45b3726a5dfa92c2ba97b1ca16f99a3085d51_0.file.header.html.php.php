<?php
/* Smarty version 3.1.31, created on 2017-03-31 12:47:07
  from "C:\xampp\htdocs\Testowanie\templates\header.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58de33ab4342c5_40168223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7b45b3726a5dfa92c2ba97b1ca16f99a3085d51' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Testowanie\\templates\\header.html.php',
      1 => 1490957222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58de33ab4342c5_40168223 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html> 
<html>
    <head>
        <title>Przykład wykorzystania wzorca MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
         <!-- Bootstrap -->
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
vendor/twbs/bootstrap/dist/css/custom.css">
        <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
vendor/twbs/bootstrap/dist/css/jquery-ui.min.css">	
        
         
    </head>
    <body>
        <div class="jumbotron text-center">
  <h1>Nazwa firmy</h1>
  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Rozwi� nawigacj�</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">"Marka - Logo strony"</a>
    </div>

    <!-- Grupowanie element�w menu w celu lepszego wy�wietlania na urz�dzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Koordynator <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="#">Lista koordynator�w</a></li>
            <li><a href="#">Dodanie koordynatora</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Doradca biznesowy <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="#">Lista doradc�w</a></li>
            <li><a href="#">Dodanie doradcy</a></li>
            
          </ul>
        </li>
        <li> <a href="#" class="dropdown-toggle" >Raport sprzedaży</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>
<!--        <nav class="navbar navbar-inverse "> -->
<!--   <div class="container-fluid"> -->
<!--     <div class="navbar-header"> -->
<!--       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> -->
<!--               <span class="icon-bar"></span> -->
<!--         <span class="icon-bar"></span> -->
<!--         <span class="icon-bar"></span>                   -->
<!--       </button> -->
<!--     </div> -->
<!--     <div class="collapse navbar-collapse" id="myNavbar"> -->
<!--       <ul class="nav navbar-nav"> -->
<!--         <li><a class="navbar-brand" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/"><span class="glyphicon glyphicon-home"></span></a></li> -->
<!--         <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/">Kordynator Sprzeda�y </a></li> -->
<!--         	<ul class="dropdown-menu" role="menu"> -->
<!--         		<li><a href="#">Dodawanie koordynatora</a></li> -->
<!--         	</ul> -->
<!--         <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria/">Doradca Biznesowy</a></li> -->
<!--         <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Autor/">Raport sprzeda�y</a></li> -->
<!--       </ul> -->
<!--         <form class="navbar-form navbar-left" id='frmData' method='POST' action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/szukaj"> -->
<!--       <div class="form-group"> -->
<!--         <input type="text"  name="rokwydania" id="rokwydania" class="form-control autocomplete" placeholder="Wpisz rok wydania"> -->
<!--       </div> -->
<!--       <button type="submit" class="btn btn-default"><span class=" 	glyphicon glyphicon-search"></span></button> -->
<!--     </form> -->
<!--       <ul class="nav navbar-nav navbar-right"> -->
<!--         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
<!--         <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
<!--       </ul> -->
<!--     </div> -->
  </div>
</nav>
<?php }
}
