$(document).ready(function () {
    // Listen for form submission
    $("#step1-form").submit(function (event) {
        // Prevent default form submission behavior
        event.preventDefault();

        // Change button text to loading gif
        $("#submit-button").html('<img src="loading.gif" alt="Loading...">');

        // Serialize form data
        var formData = $(this).serialize();

        // Send AJAX request to server
        $.ajax({
            url: "/step2", // Replace with the URL of the next step blade page
            type: "POST",
            data: formData,
            success: function (response) {
                // Load the next step blade page into the current page
                $("#booking-form").html(response);
            },
            error: function (xhr, status, error) {
                // Handle errors here
                console.log(xhr.responseText);
            },
            complete: function () {
                // Change button text back to original text
                $("#submit-button").html("Submit");
            },
        });
    });
});
