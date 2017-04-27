<?php
/* Smarty version 3.1.31, created on 2017-04-27 14:38:55
  from "C:\xampp\htdocs\Doradcy\Testowanie\templates\header.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5901e65fc2fc86_98204080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '927c402a5bdf74d2719be9ffb35212972b02bd92' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Doradcy\\Testowanie\\templates\\header.html.php',
      1 => 1493296489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5901e65fc2fc86_98204080 (Smarty_Internal_Template $_smarty_tpl) {
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
      <a class="navbar-brand" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
/">"Marka - Logo strony"</a>
    </div>

    <!-- Grupowanie element�w menu w celu lepszego wy�wietlania na urz�dzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Koordynator <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koordynator/">Lista koordynator�w</a></li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koordynator/dodajKS">Dodanie koordynatora</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Doradca biznesowy <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Doradca/">Lista doradc�w</a></li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Doradca/dodajDB">Dodanie doradcy</a></li>
          <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Doradca/addPred">Dodanie predykcji sprzedaży</a></li>

          </ul>
        </li>
        <li> <a href="#" class="dropdown-toggle" >Raport sprzedaży</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>

<!--       <ul class="nav navbar-nav navbar-right"> -->
<!--         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
<!--         <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
<!--       </ul> -->
<!--     </div> -->
  </div>
</nav>
<?php }
}
