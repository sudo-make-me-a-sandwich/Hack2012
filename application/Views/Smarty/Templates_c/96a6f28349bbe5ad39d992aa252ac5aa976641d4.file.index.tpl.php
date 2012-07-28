<?php /* Smarty version Smarty-3.1.8, created on 2012-07-28 14:00:50
         compiled from "/Users/sam/Sites/Hack2012/application/Views/Smarty/Templates/Controller/Default/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7936927795013e282c4a734-05076730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96a6f28349bbe5ad39d992aa252ac5aa976641d4' => 
    array (
      0 => '/Users/sam/Sites/Hack2012/application/Views/Smarty/Templates/Controller/Default/index.tpl',
      1 => 1343480446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7936927795013e282c4a734-05076730',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5013e282ca38c6_34754761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5013e282ca38c6_34754761')) {function content_5013e282ca38c6_34754761($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<div class="content">
		<h1>Welcome to LSF!</h1>
		<p>This is your index page.</p>
		
		<div class="hr"><hr /></div>
	
		
		<h2>Where does everything live?</h2>
		<ul>
			<li>Templates in: /application/Views/Smarty/Templates</li>
			<li>Publically accessible files (assets, etc) in: /public</li>
		</ul>
	</div>
	<!-- /content -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>