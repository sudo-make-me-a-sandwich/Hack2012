<?php /* Smarty version Smarty-3.1.8, created on 2012-07-29 01:35:31
         compiled from "/Users/sam/Sites/Hack2012/application/Views/Smarty/Templates/Controller/Default/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7936927795013e282c4a734-05076730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96a6f28349bbe5ad39d992aa252ac5aa976641d4' => 
    array (
      0 => '/Users/sam/Sites/Hack2012/application/Views/Smarty/Templates/Controller/Default/index.tpl',
      1 => 1343520235,
      2 => 'file',
    ),
    'dea4803fcd3620f29a94917cbd8467d57a40c208' => 
    array (
      0 => '/Users/sam/Sites/Hack2012/application/Views/Smarty/Templates/layout.tpl',
      1 => 1343522117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7936927795013e282c4a734-05076730',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5013e282ca38c6_34754761',
  'variables' => 
  array (
    'loggedIn' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5013e282ca38c6_34754761')) {function content_5013e282ca38c6_34754761($_smarty_tpl) {?><!doctype html>
<html lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8" />
	<title>/txt</title>
	<link rel="shortcut icon" href="/images/favicon.ico" />

	<!-- CSS -->
	<link href="/css/default.css" rel="stylesheet" type="text/css" title="Default Theme" media="screen" />
	
</head>
<body>
	<div class="pageContainer">
		<div class="row header">
			<div class="content">
				<div class="threeCol">
					<a class="logo" href="/"><img src="/images/logo.png" alt="/txt" /></a>
				</div>
				
				<div class="nineCol last">
					<ul class="nav">
						<li><a href="/messages/">Messages</a></li>
						<li><a href="/profile/">Profile</a></li>
						<li><a href="/help/">Help</a></li>
						<?php if ($_smarty_tpl->tpl_vars['loggedIn']->value){?><li><a href="/logout/">Logout</a></li><?php }?>
					</ul>
				</div>
			</div>
		</div>
		
		
	<div class="row">
		<div class="content">
			<div class="twelveCol">
				<img class="banner" src="/images/banner.jpg" alt="Welcome to /txt" />
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="content">
			<div class="sevenCol">
				<h3>How?</h3>
				<p>Text join to xxxxx xxx xxx</p>
				<p>You will the be put in contact with someone.</p>
				
				<h3>Who?</h3>
				<p>Well it could be anyone, that's the fun.</p>
				
				<h3>Bored?</h3>
				<p>Don't like the person your talking to? Just text /bored and you will get someone new.</p>
			</div>
			
			<div class="fiveCol last">
				<div class="loginForm">
					<?php if ($_smarty_tpl->tpl_vars['invalidLogin']->value){?>
						<div class="loginFail">
							<p>Login failed, wrong phone number/password</p>
						</div>
					<?php }?>
					
					<?php echo $_smarty_tpl->tpl_vars['form']->value;?>

				</div>
			</div>
		</div>
	</div>

		
		<div class="footer">
		</div>
	</div>
	
	<!-- SITE JS -->
	<script src="/js/mediaqueries.js" type="text/javascript"></script>
</body>
</html>	<?php }} ?>