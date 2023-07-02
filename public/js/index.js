$(() => {
    let checkbox = $('#active')
    let label = $('label[for="active"]')

    checkbox.on('change', function () {
        if (checkbox.is(':checked')) {
            label.text('Disable')
        } else {
            label.text('Active')
        }
    })

    $(".nav-link").click(function () {


        $(this).addClass("active");

        $(".nav-link").removeClass("active");
    });
});
