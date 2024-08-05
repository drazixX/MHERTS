// Doctors Function
function addDoctorsInfo() {
    // Validate the form before submitting
    if (validateForm()) {
        // Retrieve data from the form
        var formData = new FormData(document.querySelector('form'));
        
        // Send AJAX request to server-side script
        $.ajax({
            type: "POST",
            url: "add_doctors.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#exampleModal').modal('hide');
                // Reload the page after a short delay to ensure the success message is visible
                setTimeout(function() {
                    location.reload();
                }, 1000);

                // Show success alert message
                var successAlert = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Doctor's information has been added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
                $("#alertContainer").html(successAlert);
            },
            error: function(xhr, status, error) {
                // Handle error response
                var errorMessage = "Error adding doctor: " + error; // Consider revising this error message
                var errorAlert = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ${errorMessage}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
                $("#alertContainer").html(errorAlert);
            }
        });
    }
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
    return true; // Form is valid
}
