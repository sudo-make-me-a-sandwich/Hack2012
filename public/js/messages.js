var Messages = Class.create ({
	
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
		this.container.select('.messageGroup').each(function(link){
			link.observe("click", this.slideClicked.bind(this));
            
            link.store("height", link.getHeight());
		}.bind(this));
	},
    
    start: function()
	{	
		this.container.select('.messageGroup').each(function(slide, index)
        {
            slide.setStyle({
                height: '31px'
            });
		});
	},
    
    slideClicked: function(event)
	{   
    	if(event.element().up('.messageGroup').hasClassName("open"))
    	{
    		//close slide
    		//remove class open
    		event.element().up('.messageGroup').removeClassName('open');
            
            //animated closed
           	new Effect.Morph(event.element().up('.messageGroup'), {
				style: 'height: 31px;',
                duration: 0.5
        	});
           	
           	//change icon
           	event.element().up('.messageGroup').down(".icon").innerHTML = "+";
    	}
    	else
    	{
    		//open one clicked on
            var height = "height: " + event.element().up('.messageGroup').retrieve("height") + "px;";
            
            new Effect.Morph(event.element().up('.messageGroup'), {
                style: height,
                duration: 0.5
            });
            
            //add class open
            event.element().up('.messageGroup').addClassName('open');
            
          //change icon
           	event.element().up('.messageGroup').down(".icon").innerHTML = "-";
    	}
	}
});


document.observe('dom:loaded', function()
{	
    $$('.messages').each(function(element){
        new Messages(element);
    });
});