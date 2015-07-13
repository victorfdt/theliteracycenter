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
			$("#confirmButton").hide();
			//Show the modal div
			$("#myModal").modal();
		} else {
			$("#confirmButton").show();
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
			$("#confirmButton").attr('href', confirmButtonLink);

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
			$("#confirmButton").attr('href', confirmButtonLink);

			//Show the modal div
			$("#myModal").modal();
		}
	});

	/** 
	Banner change status button
	Check if status was pressioned, and modifies the modal.
	*/
	$("#statusButton").click(function(){

		if(isItemSelected()){			
			//Changing the information on modal
			$("#modalHeader").text("Statu of the  "+ element);
			$("#modalContent").text("Changing the status of the image "+ element +" operation.");

			//Setting the delete button with the selected user id		
			var pathButtonLink = statusPath + '/' + $('table input[type=radio]:checked').val();
			$("#confirmButton").attr('href', pathButtonLink);

			//Show the modal div
			$("#myModal").modal();
		}
	});

	//Preview image funcionality
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#imagePreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#inputFile").change(function(){
      readURL(this);
    });

});