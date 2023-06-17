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
        $.ajax({
            url: "/blogs/{id}/like",
            type: "POST",
            dataType: "json",
            success: function (response) {
                // Update the number on the page
                $("#current-number").text(response.number);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            },
        });
    });
})
