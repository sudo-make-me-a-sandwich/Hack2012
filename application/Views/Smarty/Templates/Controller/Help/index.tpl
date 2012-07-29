{extends file="layout.tpl"}
	
{block "content"}
	<div class="row">
		<div class="content">
			<div class="sevenCol">
				<h3>How do I join?</h3>
				<p>Just text /chat to {$txtNumber}</p>
				
				<h3>How do I get someone new / more interesting?</h3>
				<p>Just reply in your conversation with "/bored" and you'll get someone new, hopefully they'll be more interesting/entertaining.</p>
				
				<h3>What else can I do?</h3>
				Try texting one or more of these commands, you can probably guess what they might do. (This won't interrupt your current chat session).
				
				<ul class="padding">
					<li>/joke</li>
					<li>/insult</li>
					<li>/drink</li>
					<li>/fact</li>
					<li>/catfact</li>
					<li>/flirt</li>
					<li>/help</li>
				</ul>
			</div>
			
			<div class="fiveCol last">
				<img class="helpImage" src="/images/help.jpg" alt="looking for some help?" />
			</div>
		</div>
	</div>
{/block}