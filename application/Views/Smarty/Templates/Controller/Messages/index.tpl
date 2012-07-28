{include file="header.tpl"}
	
	<div class="content">
		<h1>Messages!</h1>
		<p>Hello</p>
		
		{if $messageSent}
			Your message was sent, dufus.
		{else}
			{$form}
		{/if}
	</div>
	<!-- /content -->

{include file="footer.tpl"}