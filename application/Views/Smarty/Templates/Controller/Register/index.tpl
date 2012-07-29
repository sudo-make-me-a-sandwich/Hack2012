{extends file="layout.tpl"}
	
{block "content"}
	<div class="row">
		<div class="content">
			<div class="sevenCol">
				<h3>Register</h3>
				<p>Jut fill in the form and you will be good to go.</p>
			</div>
			
			<div class="fiveCol last">
				<div class="form">
					<img src="/images/bg-register.png" alt="" />
					
					{if $unableToRegister}
						<h3>Already registered?</h3>
						<p>It seems you have already registered</p>
					{else}
						{$form}
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}