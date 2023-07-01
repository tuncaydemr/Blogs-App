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
        $(".nav-link").removeClass("active");

        let index = $(this).index();

        $(".nav-link").eq(index).addClass("active");
    });
})
