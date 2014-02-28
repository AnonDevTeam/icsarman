window.utils = {

	serializer : function(parentElement){
		
		inputs = $(parentElement).find("input,textarea");
		//inputs.pop();

		object = {};

		$.each(inputs,function(){

			if($(this).attr("type")!="submit"){
				key = $(this).attr("name");
				value = $(this).val();
				object[key] = value;
			}
		
		});

		return object;

	}

}

