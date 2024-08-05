// For appointment

function addAppointment() {
    if (validateForm()) { 
        var title = $('#title').val();
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var date = $('#date').val();
        var startTime = $('#startTime').val();
        var endTime = $('#endTime').val();
        var address = $('#address').val();
        var mobile = $('#mobile').val();
        var email = $('#email').val();
        var doctor = $('#doctor').val();
        var condition = $('#condition').val();
        var note = $('#note').val();

        // If all fields are filled, proceed with AJAX request
        $.ajax({
            url: 'add_appointment.php',
            method: 'POST',
            data: {
                title: title,
                firstName: firstName,
                lastName: lastName,
                date: date,
                startTime: startTime,
                endTime: endTime,
                address: address,
                mobile: mobile,
                email: email,
                doctor: doctor,
                condition: condition,
                note: note
            },
            success: function (response) {
                $('#exampleModal').modal('hide');
                // Reload the page after a short delay to ensure the success message is visible
                setTimeout(function() {
                    location.reload();
                }, 1000);

                // Show success alert message
                var successAlert = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Appointment added successfully!
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
    // Return true if form is valid
    return true;
}

// Function for accepting the appointment
function acceptAppointment(A_Id) {
    if (confirm("Are you sure you want to accept this appointment?")) {
        $.ajax({
            url: 'accept_appointment.php',
            method: 'POST',
            data: { A_Id: A_Id },
            success: function(response) {
                $('#appointmentRow_' + A_Id).remove();
                alert('Appointment accepted and moved to patients table successfully!');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error: Unable to accept appointment.');
            }
        });
    }
}

// Function for declining the appointment
function declineAppointment(A_Id) {
    // Show modal to input decline reason
    $('#declineReasonModal').modal('show');

    // Save appointment ID to a hidden field in the modal
    $('#declineAppointmentId').val(A_Id);
}

// Function to submit decline reason and move appointment to archive
function submitDeclineReason() {
    var A_Id = $('#declineAppointmentId').val();
    var declineReason = $('#declineReason').val();

    $.ajax({
        url: 'decline_appointment.php',
        method: 'POST',
        data: { A_Id: A_Id, declineReason: declineReason },
        success: function(response) {
            $('#appointmentRow_' + A_Id).remove();
            alert('Appointment declined and moved to archive successfully!');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Error: Unable to decline appointment.');
        }
    });

    // Close the modal
    $('#declineReasonModal').modal('hide');
}

