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
		
	},
    
    start: function()
	{	
		
	},
    
    commandClicked: function(event)
	{   
    	
	}
});


document.observe('dom:loaded', function()
{	
    $('messageInput') {
        new ListCommands($('messageInput'));
    });
});