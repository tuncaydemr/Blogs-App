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

    let descriptionMore = $('.card-description h6 a');

    if ($('.card-description h6').hasClass('text-truncate')) {
        descriptionMore.addClass('d-block');
        descriptionMore.removeClass('d-none');
    }else {
        descriptionMore.addClass('d-none');
        descriptionMore.removeClass('d-block');
    }
});
