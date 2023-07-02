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

    let currentPageUrl = window.location.pathname;

    $("#nav li a").each(function () {
        if ($(this).attr("href") === currentPageUrl) {
            $(this).addClass("active");
        }
    });
});
