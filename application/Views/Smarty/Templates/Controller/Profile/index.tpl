{extends file="layout.tpl"}
	
{block "content"}
	<div class="row">
		<div class="content">
			<div class="twelveCol">
				<img class="banner" src="/images/banner3.jpg" alt="Your profile" />
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="content">
			<div class="twelveCol">
				<h3>Your number:</h3>
				<p>{$profile.number}</p>
			</div>
		</div>
	</div>
{/block}