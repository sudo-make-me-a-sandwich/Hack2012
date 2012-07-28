{extends file="layout.tpl"}
	
{block "content"}
	<h1>Messages</h1>
	
	{if $messageSent}
		Your message was sent, dufus.
	{else}
		{$form}
	{/if}
{/block}