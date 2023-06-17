$(() => {
    let checkbox = $('#active');
    let label = $('label[for="active"]');

    checkbox.on('change', function () {
        if (checkbox.is(':checked')) {
            label.text('Disable');
        } else {
            label.text('Active');
        }
    });

    $("#increment-button").click(function () {
        $.get("/blogs/{id}/like", function (response) {
            // Update the number on the page
            $("#current-number").text(response.likes);
        });
    });
})
