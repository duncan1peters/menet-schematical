(function(){
	var objPublic = {
		Init:function(){
			$('a[data-toggle="show"], a[data-toggle="hide"]').click(
				function(objEvent){
					objEvent.preventDefault();
					
					var strSelector = $(this).attr('href');
					var strVerb = $(this).attr('data-toggle');
					var strParentSelector = $(this).attr('data-parent');
					MDE.Home.Show(strSelector, strVerb);
					
				}
			);
		},
		Show:function(strSelector, strVerb){
			var jSibblings = $(strSelector).closest('.accordion').find('.accordion-body ');
			for(var i = 0; i < jSibblings.length; i++){
				var jSibbling = $(jSibblings[i]);
				if('#' + jSibbling.attr('id') != strSelector){
				 	var intHeight = jSibbling.css('height');
					if(intHeight != '0px'){
						jSibbling.collapse('hide');
					}
				}
			}
			var intHeight = $(strSelector).css('height');
			if(strVerb == 'hide'){
				
				if(intHeight != '0px'){
					MDE.Home.Success(strSelector);
					//$(strSelector).collapse(strVerb);
				}
			}else{
				if(intHeight == '0px'){
					$(strSelector).collapse(strVerb);
				}
			}
		},
		Success:function(strSelector){
			//tURN SHIT green
			var jEle = $(strSelector);
			jEle.find('.accordion-heading').css('background', '#dff0d8');
			var jChildren = $(strSelector).find('.accordion-body');
			MDE.Home.Show(jChildren[0], 'hide');
			return;//
			var jChildren = $(strSelector).find('.accordion-body');
			for(var i = 0; i < jChildren.length; i++){
				jChild = $(jChildren[i]);
				var intHeight = $(strSelector).css('height');
				if(intHeight != '0px'){
					jChild.collapse('hide');
				}
			}
			//$(strSelector).collapse('hide');
		}
	
	};
	MDE.Home = objPublic;
	
})();
