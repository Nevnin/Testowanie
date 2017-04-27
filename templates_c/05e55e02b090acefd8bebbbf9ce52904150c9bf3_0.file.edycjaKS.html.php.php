<?php
/* Smarty version 3.1.31, created on 2017-04-27 01:38:06
  from "C:\xampp\htdocs\Doradcy\Testowanie\templates\edycjaKS.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59012f5e17c278_43999716',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05e55e02b090acefd8bebbbf9ce52904150c9bf3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Doradcy\\Testowanie\\templates\\edycjaKS.html.php',
      1 => 1493249878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_59012f5e17c278_43999716 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php $_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div  class="container">
    <div class="page-header">
<h1  style="text-align: center;">Edytuj Koordynatora</h1>

<form id="addKS" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koordynator/update" method="post">
    <div class="form-group">
    <label for="id">Id:</label>
    <input class="form-control" type="text" id="id" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['oneKor']->value['id'];?>
" readonly/>
    </div>
    <div class="form-group">
    <label for="imie">Imię:</label>
    <input class="form-control" type="text" id="imie" name="imie" placeholder="Wprowadź imie koordynatora" value="<?php echo $_smarty_tpl->tpl_vars['oneKor']->value['imie'];?>
" />
    </div>
    <div class="form-group">
        <label for="nazwisko">Nazwisko:</label>
    <input type="text" name="nazwisko" id="nazwisko" class="form-control" placeholder="Wprowadź nazwisko koordynatora" value="<?php echo $_smarty_tpl->tpl_vars['oneKor']->value['nazwisko'];?>
" />    
    </div>
   
    <div class="form-group">
        <label for="miasto">Miasto:</label>
    <input type="text" name="miasto" id="miasto" class="form-control" placeholder="Wprowadź miasto koordynatora"value="<?php echo $_smarty_tpl->tpl_vars['oneKor']->value['miasto'];?>
" />    
    </div>
    <button type="submit" class="btn btn-default" value="Dodaj">Edytuj</button>
</form>
    </div>
</div>

 <?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
