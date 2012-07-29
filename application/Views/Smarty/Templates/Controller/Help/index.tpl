{extends file="layout.tpl"}
	
{block "content"}
	<div class="row">
		<div class="content">
			<div class="sevenCol">
				<h3>How do I join?</h3>
				<p>Just text /chat to {$txtNumber}</p>
				
				<h3>How do I get someone new / more interesting?</h3>
				<p>Just reply in your convosation with "/bored" and you'll get someone new, hopefully more interesting.</p>
				
				<h3>How do I stop all this fun?</h3>
				<p>Just text /stop, and you will opt out of all the fun. You will need to opt back in on the website when you change your mind.</p>
				
				<h3>What else can I do?</h3>
				Try texting one of these, I think you can work out what they do.
				<ul class="padding">
					<li>/joke</li>
					<li>/insult</li>
					<li>/drink</li>
					<li>/fact</li>
				</ul>
			</div>
			
			<div class="fiveCol last">
				<img class="helpImage" src="/images/help.jpg" alt="looking for some help?" />
			</div>
		</div>
	</div>
{/block}