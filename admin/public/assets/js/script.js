
// Patients Function
function addPatientInfo() {
    // Validate the form before submitting
    // if (validateForm()) { 
        // Retrieve data from the form
        var title = $("#title").val();
        var firstName = $("#firstName").val();
        var middleName = $("#middleName").val();
        var lastName = $("#lastName").val();
        var dateOfBirth = $("#dateOfBirth").val();
        var gender = $("#gender").val();
        var civilStatus = $("#civilStatus").val();
        var trimester = $("#trimester").val();
        var address = $("#address").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var medicalHistory = $("#hasMedicalHistory").val();
        var obstetricHistory = $("#obstetricHistory").val();
        var dateCheckIn = $("#dateCheckIn").val(); // New field
        var doctorAssigned = $("#doctorAssigned").val(); // New field

        // Prepare data to send in AJAX request
        var data = {
            title: title,
            firstName: firstName,
            middleName: middleName,
            lastName: lastName,
            dateOfBirth: dateOfBirth,
            gender: gender,
            civilStatus: civilStatus,
            trimester: trimester,
            address: address,
            phone: phone,
            email: email,
            medicalHistory: medicalHistory,
            obstetricHistory: obstetricHistory,
            dateCheckIn: dateCheckIn, // Include new field in data
            doctorAssigned: doctorAssigned // Include new field in data
        };

        // If Medical History is "yes", include additional fields
        if (medicalHistory === "yes") {
            data.conditions = $("#conditions").val();
            data.diagnosisDate = $("#diagnosisDate").val();
            data.treatment = $("#treatment").val();
            data.medications = $("#medications").val();
            data.surgeries = $("#surgeries").val();
        }

        // Send AJAX request to server-side script
        $.ajax({
            type: "POST",
            url: "add_patients.php", // Replace with your server-side script URL
            data: data,
            success: function(response) {
                $('#exampleModal').modal('hide');
                // Reload the page after a short delay to ensure the success message is visible
                setTimeout(function() {
                    location.reload();
                }, 1000);

                // Show success alert message
                var successAlert = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>    
                        <strong>Success!</strong> Patient has been added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
                $("#alertContainer").html(successAlert);
            },
            error: function(xhr, status, error) {
                // Handle error response
                var errorMessage = "Error adding patient: " + error; // Consider revising this error message
                var errorAlert = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ${errorMessage}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
                $("#alertContainer").html(errorAlert);
            }
        });
    // }
}



	// Function to update the check-in date
	function updateCheckInDate() {
		var currentDate = new Date();
		var formattedDate = currentDate.toISOString().slice(0, 19).replace('T', ' ');
		document.getElementById("dateCheckIn").value = formattedDate;
	}

	window.onload = updateCheckInDate;

	function refreshPage() {
        window.location.reload();
    }

	function validateForm() {
        // Check if all required fields are filled
        var inputs = document.querySelectorAll('input[required], select[required], textarea[required]');
        for (var i = 0; i < inputs.length; i++) {
            if (!inputs[i].value.trim()) {
                var errorMessage = "Please fill in all required fields.";
                var errorToast = `
                    <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <strong>Error!</strong> ${errorMessage}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>`;
                $("#alertContainer").html(errorToast); // Append error message to alert container
                var errorToastElement = document.querySelector('.toast');
                var toast = new bootstrap.Toast(errorToastElement);
                toast.show(); // Show the toast notification
                
                // Hide the toast after 3 seconds
                setTimeout(function() {
                    toast.hide();
                }, 3000);
                
                return false;
            }
        }
        
        // Check if medical history is selected
        var hasMedicalHistory = document.getElementById('hasMedicalHistory').value;
        if (hasMedicalHistory === 'no') {
            return true; // No need to validate medical history fields if the user selects "No"
        }
        
        // If medical history is selected, check if its fields are filled
        var medicalInputs = document.querySelectorAll('#medicalHistoryFields input[required], #medicalHistoryFields select[required], #medicalHistoryFields textarea[required]');
        for (var j = 0; j < medicalInputs.length; j++) {
            if (!medicalInputs[j].value.trim()) {
                alert("Please fill in all required fields for medical history.");
                return false;
            }
        }
        
        // If all validations pass, submit the form
        return true;
    }
    
    


    function toggleMedicalHistoryFields() {
        var hasMedicalHistory = document.getElementById('hasMedicalHistory').value;
        var medicalHistoryFields = document.getElementById('medicalHistoryFields');
        if (hasMedicalHistory === 'yes') {
            medicalHistoryFields.style.display = 'block';
        } else {
            medicalHistoryFields.style.display = 'none';
        }
    }

    


