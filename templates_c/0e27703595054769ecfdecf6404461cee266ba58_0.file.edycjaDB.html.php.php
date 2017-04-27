<?php
/* Smarty version 3.1.31, created on 2017-04-27 14:53:25
  from "C:\xampp\htdocs\Doradcy\Testowanie\templates\edycjaDB.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5901e9c5a3a387_62465304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e27703595054769ecfdecf6404461cee266ba58' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Doradcy\\Testowanie\\templates\\edycjaDB.html.php',
      1 => 1493297587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5901e9c5a3a387_62465304 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php $_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div  class="container">
    <div class="page-header">
<h1  style="text-align: center;">Dodaj Doradce Biznesowego</h1>

<form id="addKS" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Doradca/update" method="post">
    <div class="form-group">
    <label for="id">Id:</label>
    <input class="form-control" type="text" id="id" name="id" readonly value="<?php echo $_smarty_tpl->tpl_vars['oneDor']->value['id'];?>
"/>
    </div>
    <div class="form-group">
    <label for="imie">Imię:</label>
    <input class="form-control" type="text" id="imie" name="imie" placeholder="Wprowadź imie doradcy" value="<?php echo $_smarty_tpl->tpl_vars['oneDor']->value['imie'];?>
" />
    </div>
    <div class="form-group">
        <label for="nazwisko">Nazwisko:</label>
    <input type="text" name="nazwisko" id="nazwisko" class="form-control" placeholder="Wprowadź nazwisko doradcy" value="<?php echo $_smarty_tpl->tpl_vars['oneDor']->value['nazwisko'];?>
"/>    
    </div>
     <div class="form-group">
        <label for="sid">SID:</label>
    <input type="text" name="sid" id="sid" class="form-control" placeholder="Wprowadź numer SID doradcy" value="<?php echo $_smarty_tpl->tpl_vars['oneDor']->value['SID'];?>
"/>    
    </div>
   	<div class="form-group">
     <label for="autor">Koordynator:</label>
        <select class="form-control" name=koordynator>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allKorAll']->value, 'wiersz', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['wiersz']->value) {
?>
     <?php if ($_smarty_tpl->tpl_vars['wiersz']->value['id'] == $_smarty_tpl->tpl_vars['oneDor']->value['koordynator']) {?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['wiersz']->value['id'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['wiersz']->value['imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['wiersz']->value['nazwisko'];?>
</option>
    <?php } else { ?> 
    <option value="<?php echo $_smarty_tpl->tpl_vars['wiersz']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['wiersz']->value['imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['wiersz']->value['nazwisko'];?>
</option>
     <?php }?> 
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </select>
    </div>
    <div class="form-group">
        <label for="miasto">Miasto:</label>
    <input type="text" name="miasto" id="miasto" class="form-control" placeholder="Wprowadź miasto doradcy" value="<?php echo $_smarty_tpl->tpl_vars['oneDor']->value['miasto'];?>
"/>    
    </div>
    <button type="submit" class="btn btn-default" value="Dodaj">Edytuj</button>
</form>
    </div>
</div>

 <?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
