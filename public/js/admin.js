$(document).ready(function(){
/** 
	Verify is an item is selected.
	*/
	function isItemSelected(){
		var selected = false;
		//Checking if there is a user selected
		if($('table input[type=radio]:checked').length <= 0){
			//Changing the information on modal
			$("#modalHeader").text("Select an " + element);
			$("#modalContent").text("You have to select an " + element);
			$("#confirmDeleteButton").hide();
			$("#confirmUpdateButton").hide();

			//Show the modal div
			$("#myModal").modal();
		} else {
			selected = true;
		}

		return selected;
	}

/** 
	Check if the delete button was pressioned, and modifies the modal.
	*/
	$("#deleteButton").click(function(){

		if(isItemSelected()){
			//Changing the information on modal
			$("#modalHeader").text("Delete " + element);
			$("#modalContent").text("Delete "+ element +" operation.");

			//Setting the delete button with the selected user id		
			var confirmButtonLink = deletePath + '/' + $('table input[type=radio]:checked').val();
			$("#confirmDeleteButton").attr('href', confirmButtonLink);		
			$("#confirmDeleteButton").show();
			$("#confirmUpdateButton").hide();

			//Show the modal div
			$("#myModal").modal();
		}
	});

/** 
	Check if the update button was pressioned, and modifies the modal.
	*/
	$("#updateButton").click(function(){

		if(isItemSelected()){			
			//Changing the information on modal
			$("#modalHeader").text("Update "+ element);
			$("#modalContent").text("Update "+ element +" operation.");

			//Setting the delete button with the selected user id		
			var confirmButtonLink = editPath + '/' + $('table input[type=radio]:checked').val();
			$("#confirmUpdateButton").attr('href', confirmButtonLink);		
			$("#confirmUpdateButton").show();
			$("#confirmDeleteButton").hide();

			//Show the modal div
			$("#myModal").modal();
		}
	});

});