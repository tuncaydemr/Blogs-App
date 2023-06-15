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
        $.post("/blogs/{id}", function (response) {
            $("#current-number").text(response.likes);
        });
    });
})
