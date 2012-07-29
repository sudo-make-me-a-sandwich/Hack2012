<!doctype html>
<html lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8" />
	<title>/txt</title>
	<link rel="shortcut icon" href="/images/favicon.ico" />

	<!-- CSS -->
	<link href="/css/default.css" rel="stylesheet" type="text/css" title="Default Theme" media="screen" />
	
	<!-- JS Libs -->
	<script src="/js/libs/procculous.js" type="text/javascript"></script>
</head>
<body>
	<div class="pageContainer">
		<div class="row header">
			<div class="content">
				<div class="threeCol">
					<a class="logo" href="/"><img src="/images/logo.png" alt="/txt" /></a>
				</div>
				
				<div class="fourCol">
					<div class="largeNumber">
						{$txtNumber}
					</div>
				</div>
				
				<div class="fiveCol last">
					<ul class="nav">
						<li><a href="/messages/">Messages</a></li>
						<li><a href="/profile/">Profile</a></li>
						<li><a href="/help/">Help</a></li>
						{if $loggedIn}<li><a href="/logout/">Logout</a></li>{/if}
					</ul>
				</div>
			</div>
		</div>
		
		{block "content"}{/block}
		
		<div class="footer">
		</div>
	</div>
	
	<!-- SITE JS -->
	<script src="/js/mediaqueries.js" type="text/javascript"></script>
	<script src="/js/messages.js" type="text/javascript"></script>
	<script src="/js/listCommands.js" type="text/javascript"></script>
</body>
</html>	