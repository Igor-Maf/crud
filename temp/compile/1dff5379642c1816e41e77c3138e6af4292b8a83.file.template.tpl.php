<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-11-11 22:21:51
         compiled from "E:\xampp\htdocs\traffic-crs\views\layout\default\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12408544cd026e683b8-21412875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dff5379642c1816e41e77c3138e6af4292b8a83' => 
    array (
      0 => 'E:\\xampp\\htdocs\\traffic-crs\\views\\layout\\default\\template.tpl',
      1 => 1415738927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12408544cd026e683b8-21412875',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544cd027037d82_52479876',
  'variables' => 
  array (
    'title' => 0,
    '_layoutParams' => 0,
    'js' => 0,
    'menu' => 0,
    '_content' => 0,
    '_access' => 0,
    '_error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544cd027037d82_52479876')) {function content_544cd027037d82_52479876($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "Traffic-CRS" : $tmp);?>
</title>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
favicon.ico" rel="icon" type="image/x-icon" />
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery.validationEngine-ru.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery.validationEngine.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery-ui-1.9.2.custom.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/main.js"><?php echo '</script'; ?>
>
        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])) {?>
            <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
                <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
"><?php echo '</script'; ?>
>
            <?php } ?>
        <?php }?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root_css'];?>
style.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/css/validationEngine.jquery.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/css/jquery-ui-1.9.2.custom.min.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div class="wrapper">
             <header>
                <div id="menu">
                    <ul>
                        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu'])) {?>
                            <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a></li>
                            <?php } ?>
                        <?php }?>
                    </ul>
                </div>
            </header>
            <section>
                <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php if (isset($_smarty_tpl->tpl_vars['_access']->value)) {?>
                    <div id="access"><?php echo $_smarty_tpl->tpl_vars['_access']->value;?>
</div>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['_error']->value)) {?>
                    <div id="error"><?php echo $_smarty_tpl->tpl_vars['_error']->value;?>
</div>
                <?php }?>
            </section>
            <footer>
                <!--<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['pdf'];?>
">Скачать PDF</a>-->
            </footer>
        </div>
    </body>
</html><?php }} ?>
