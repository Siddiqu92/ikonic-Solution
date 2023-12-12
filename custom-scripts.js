jQuery(document).ready(function($) {
    // Ajax request for architecture projects
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        data: {
            action: 'get_architecture_projects',
        },
        success: function(response) {
            if (response.success) {
                // Process the response.data array
                console.log(response.data);
            } else {
                console.log('Error retrieving projects.');
            }
        },
        error: function(error) {
            console.log('Ajax request failed: ' + error.responseText);
        }
    });
});
