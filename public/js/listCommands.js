var ListCommands = Class.create ({
	
	initialize: function(container)
	{
		this.container = container;
		
		if (!this.container)
		{
			return false;
		}
				
		this.addControls();
        this.start();
	},
	
	addControls: function()
	{			
		this.container.observe('keyUp', function(event) {
			alert(this.container.readAttribute('value'));
		});
	},
    
    start: function()
	{	
		
	},
	
	formUpdated: function()
	{
		this.container.getValue().startsWith('/');
	},
    
    commandClicked: function(event)
	{   
    	
	}
});


document.observe('dom:loaded', function()
{	
    if ($('messageInput')) {
        new ListCommands($('messageInput'));
    }
});