{extends file="layout.tpl"}
	
{block "content"}
	<div class="row">
		<div class="content">
			<div class="twelveCol">
				<img src="/images/banner.jpg" alt="Welcome to /txt" />
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
					{$form}
				</div>
			</div>
		</div>
	</div>
{/block}