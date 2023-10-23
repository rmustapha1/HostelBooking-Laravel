$(document).ready(function () {
    // Listen for form submission
    $("#submit-button").click(function (event) {
        // Prevent default form submission behavior
        event.preventDefault();

        // Change button text to loading gif
        $("#submit-button").html(
            '<img src="{{asset(images/loader.gif)}}" alt="Loading...">'
        );

        var formData1 = $("#form1").serialize();
        var formData2 = $("#form2").serialize();

        // Combine the form data into a single object
        var combinedFormData = formData1 + "&" + formData2;

        // Send AJAX request to server
        $.ajax({
            url: "/step1", // Replace with the URL of the next step blade page
            type: "POST",
            data: combinedFormData,
            success: function (response) {
                // Load the next step blade page into the current page
                $("#step2").html(response);
            },
            error: function (xhr, status, error) {
                // Handle errors here
                console.log(xhr.responseText);
            },
            complete: function () {
                // Change button text back to original text
                $("#submit-button").html(
                    'Next: Payment <i class="bi bi-chevron-right"></i>'
                );
            },
        });
    });
});
