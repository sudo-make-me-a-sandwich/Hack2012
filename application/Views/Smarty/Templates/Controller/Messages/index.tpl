{extends file="layout.tpl"}
	
{block "content"}
	<div class="row">
		<div class="content">
			<div class="twelveCol">
				<div class="currentMessages">
					<h2>Current chat session:</h2>
					
					{if $response}
						<div class="command">
							<h4>{$command}</h4>
							{$response}
						</div>
					{/if}
					<div class="messageGroup">
		                <ul>
							{foreach $currentSession as $message}
								<li class="{$message.sentBy}">{$message.sentBy} <span class="date">({$message.timestamp|date_format:"%d %B %Y at %H:%M"})</span>: {$message.text}</li>
							{/foreach}
						</ul>
						
						<div class="sendMessgeForm">
							{$form}
						</div>
		            </div>
				</div>
				
				<div class="messageHistory">
					<h2>Message history:</h2>
					
					<div class="messages">
				        {foreach $sessions as $sessionId => $messages}       	
				            <div class="messageGroup">
				            	<div class="titleBar">
				                	<div class="icon">+</div>
				                    
				                    <h5>{$sessionId}</h5>
				                </div>
				                
				                <ul>
									{foreach $messages as $message}
										<li class="{$message.sentBy}">{$message.sentBy} <span class="date">({$message.timestamp|date_format:"%d %B %Y at %H:%M"})</span>: {$message.text}</li>
									{/foreach}
								</ul>
				            </div>
				        {/foreach}
				    </div>
				 </div>
			</div>
		</div>
	</div>
{/block}