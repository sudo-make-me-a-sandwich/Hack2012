{extends file="layout.tpl"}
	
{block "content"}
	<div class="row">
		<div class="content">
			<div class="twelveCol">
				<h1>Messages</h1>
	
				{if $messageSent}
					Your message was sent, dufus.
				{else}
					{$form}
				{/if}
			</div>
		</div>
	</div>
{/block}