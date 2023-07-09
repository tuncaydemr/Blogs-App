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

    let navActive = $('.nav-link');

    let currentPageUrl = window.location.href;

    navActive.each(function () {
        if ($(this).attr('href') === currentPageUrl) {
            $(this).addClass('active border-bottom border-4');
        }
    });

    // $('#description').keyup('textarea', () => {
    //     let text = $(this).val();
    //     let count = text.length;

    //     $('#letterCount').text(count);
    // })

    $("#description").on("input", function () {
        let text = $(this).val();
        let count = text.length;

        $("#letterCount").text(count);
    });
});
