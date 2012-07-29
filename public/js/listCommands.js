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
		new Form.Element.Observer(this.container, 1, this.formUpdated);
	},
    
    start: function()
	{	
		
	},
	
	formUpdated: function()
	{
		alert("test");
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