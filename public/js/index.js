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

    $("#description").on('input', function () {
        let text = $(this).val();
        let maxLength = 200;

        if (typeof text === "string") {
            let count = text.length;
            $("#letterCount").text(count + '/' + maxLength);
        }
    });
});

function openModal() {
    $("#signIn").modal("show");

    $("#modalCloseButton").click(function () {
        window.location.href = "/home";
    });

    $("#modalCloseButton2").click(function () {
        window.location.href = "/home";
    });
}
