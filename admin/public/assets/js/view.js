$(document).ready(function() {
    // Initialize the modal as a jQuery UI dialog
    $("#fileModal").dialog({
        autoOpen: false,
        modal: true,
        resizable: true, // Enable resizable option
        draggable: true, // Enable draggable option
        width: "80%", // Set initial width
        height: "auto", // Set initial height to auto
        minWidth: 400, // Set minimum width
        minHeight: 200, // Set minimum height
        maxHeight: $(window).height() - 50, // Set maximum height to viewport height - 50px
        close: function() {
            // Reset the source of the file viewer when the modal is closed
            $("#fileViewer").attr("src", "");
        }
    });

    // Event listener for the view file button
    $(".view-file-btn").on("click", function(event) {
        event.preventDefault();
        const fileId = $(this).data("file-id");
        const fileName = $(this).data("file-name");

        // Fetch the file content and display it in the modal
        fetchFileContent(fileId, fileName);
    });

    // Function to fetch file content and display it in the modal
    function fetchFileContent(fileId, fileName) {
        // Send AJAX request to fetch file content
        $.ajax({
            url: `functions/view_file.php?file_id=${fileId}&file_name=${fileName}`,
            method: "GET",
            dataType: "blob",
            success: function(blob) {
                // Set the source of the file viewer to display the file content
                const objectUrl = URL.createObjectURL(blob);
                $("#fileViewer").attr("src", objectUrl);

                // Open the modal
                $("#fileModal").dialog("open");
            },
            error: function(xhr, status, error) {
                console.error("Error fetching file content:", error);
            }
        });
    }

    // Event listener for the close button
    $(".close").on("click", function() {
        // Close the modal
        $("#fileModal").dialog("close");
    });
});



document.addEventListener("DOMContentLoaded", function() {
    const viewPdfBtns = document.querySelectorAll(".view-pdf-btn");
    const modal = document.getElementById("pdfModal");
    const pdfViewer = document.getElementById("pdfViewer");

    // Add click event listener to each view PDF button
    viewPdfBtns.forEach(btn => {
        btn.addEventListener("click", function(event) {
            event.preventDefault();
            const fileId = this.getAttribute("data-file-id");
            const fileName = this.getAttribute("data-file-name");

            // Fetch the PDF file content and display it in the modal
            fetchPdfContent(fileId, fileName);
        });
    });

    // Function to fetch PDF file content and display it in the modal
    function fetchPdfContent(fileId, fileName) {
        // Send AJAX request to fetch PDF file content
        fetch(`functions/view_file.php?file_id=${fileId}&file_name=${fileName}`)
            .then(response => response.blob())
            .then(blob => {
                // Set the source of the PDF viewer iframe to display the PDF content
                const objectUrl = URL.createObjectURL(blob);
                pdfViewer.src = objectUrl;
                
                // Display the modal
                modal.style.display = "block";
            })
            .catch(error => {
                console.error("Error fetching PDF content:", error);
            });
    }

    // Close the modal when the close button is clicked
    modal.querySelector(".close").addEventListener("click", function() {
        modal.style.display = "none";
        // Reset the source of the PDF viewer iframe
        pdfViewer.src = "";
    });

    // Close the modal when the user clicks outside of it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
            // Reset the source of the PDF viewer iframe
            pdfViewer.src = "";
        }
    };
});


