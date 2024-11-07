$(document).ready(function() {
    $('.btnRegister').click(function(e) {
        e.preventDefault(); // Prevent the default form submission
        // Switch to the "Grade" tab
        $('#profile-tab').removeClass('disabled'); // Enable the Grade tab
        $('#home-tab').removeClass('active'); // Remove active class from Register tab
        $('#profile-tab').addClass('active'); // Add active class to Grade tab
        $('#home').removeClass('show active'); // Hide Register content
        $('#profile').addClass('show active'); // Show Grade content
    });
});

$(document).ready(function() {
    // Function to check if all required fields are filled
    function checkFields() {
        let isFilled = true;
        $('#first-name, #last-name, #age, #course, #email').each(function() {
            if ($(this).val() === '') {
                isFilled = false;
            }
        });
        $('#btnRegister').prop('disabled', !isFilled);
    }

    // Event listener for input changes
    $('#first-name, #last-name, #age, #course, #email').on('input', checkFields);
});