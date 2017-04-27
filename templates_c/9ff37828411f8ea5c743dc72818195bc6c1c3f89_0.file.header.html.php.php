<?php
/* Smarty version 3.1.31, created on 2017-01-05 09:49:37
  from "C:\xampp\htdocs\Damian_Brzecki_lab8_bootstrap2\templates\header.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_586e08a1674c59_17195536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ff37828411f8ea5c743dc72818195bc6c1c3f89' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Damian_Brzecki_lab8_bootstrap2\\templates\\header.html.php',
      1 => 1483605958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_586e08a1674c59_17195536 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html> 
<html>
    <head>
        <title>Przykład wykorzystania wzorca MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
         <!-- Bootstrap -->
        <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
         <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/starter-template.css" rel="stylesheet">
    </head>
    <body>
        <div class="jumbotron text-center">
  <h1>Nazwa firmy</h1>
        </div>
       <nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                  
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a class="navbar-brand" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/">Książki </a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria/">Kategorie</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Autor/">Autorzy</a></li>
      </ul>
        <form class="navbar-form navbar-left" id='frmData' method='POST' action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/szukaj">
      <div class="form-group">
        <input type="text" id="rokwydania" name="rokwydania" class="form-control" placeholder="Wpisz rok wydania">
      </div>
      <button type="submit" class="btn btn-default"><span class=" 	glyphicon glyphicon-search"></span></button>
    </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php }
}
