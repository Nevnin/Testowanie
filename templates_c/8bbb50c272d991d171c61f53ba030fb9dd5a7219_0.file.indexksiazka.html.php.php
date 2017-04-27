<?php
/* Smarty version 3.1.31, created on 2017-03-31 09:27:12
  from "C:\xampp\htdocs\Testowanie\templates\indexksiazka.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58de04d0cb0a65_98353106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bbb50c272d991d171c61f53ba030fb9dd5a7219' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Testowanie\\templates\\indexksiazka.html.php',
      1 => 1483447246,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58de04d0cb0a65_98353106 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div>
    <h1  style="text-align: center;">Lista ksiazek</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Tytuł</th>
            <th>Autor</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
    <tbody>
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allBooks']->value, 'item', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr>
            <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/showone/<?php echo $_smarty_tpl->tpl_vars['item']->value['idksiazka'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['tytul'];?>
</a></td> : 
        <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Autor/showoneBooks/<?php echo $_smarty_tpl->tpl_vars['item']->value['idksiazka'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['Autor'];?>
</a></td>
            
			<td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/showone/<?php echo $_smarty_tpl->tpl_vars['item']->value['idksiazka'];?>
">szczegóły</a></td> 
			<td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['idksiazka'];?>
"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </tbody></table>
</div>
<a type="button" class="btn btn-default" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Ksiazka/add">Dodaj ksiazke</a>
 <?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
