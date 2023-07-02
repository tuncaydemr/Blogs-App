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

    $(".nav-item > a").click(function () {
        $(".nav-link").removeClass("active");

        $(this).addClass("active");
    });
});
