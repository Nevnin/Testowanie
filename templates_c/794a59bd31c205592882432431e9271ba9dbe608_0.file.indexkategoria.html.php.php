<?php
/* Smarty version 3.1.31, created on 2017-01-03 14:48:10
  from "C:\xampp\htdocs\Damian_Brzecki_lab8_bootstrap2\templates\indexkategoria.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_586bab9a3dc0e4_55126538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '794a59bd31c205592882432431e9271ba9dbe608' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Damian_Brzecki_lab8_bootstrap2\\templates\\indexkategoria.html.php',
      1 => 1483450838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_586bab9a3dc0e4_55126538 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php $_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div>
    <h1  style="text-align: center;">Lista kategori</h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nazwa Kategorii</th>
        <th>Ilość książek</th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCats']->value, 'item', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
		<tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nazwa'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ilosc'];?>
</td>
			<td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria/showone/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">szczegóły</a></td> 
			<td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria/delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><span class="glyphicon glyphicon-remove"></span></a></td></tr> 
		
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </tbody>
    </table></div>

<a type="button" class="btn btn-default" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria/add">Dodaj kategorie</a>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
