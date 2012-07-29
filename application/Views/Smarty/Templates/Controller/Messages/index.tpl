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
				
				<h2>Message history:</h2>
				
				<ul>
					{foreach $messages as $message}
						<li>{$message.id}: {$message.text}</li>
					{/foreach}
				</ul>
			</div>
		</div>
	</div>
{/block}