/* User LIst */
		var list = document.getElementsByTagName('ul'); 
		var items = document.getElementsByTagName('li'); 
		//console.log(items); 
			 
		for( var i = 0; i < items.length; i++){          
			if(i % 2 == 0){
				items[i].className = "evenrowcolor";
			}else{
				items[i].className = "oddrowcolor";
			}      
		}
