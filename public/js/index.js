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
                $("#current-number").text(response.blog['likes']);
            }
        });
    });
})
