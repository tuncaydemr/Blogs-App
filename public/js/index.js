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

    $('.nav-item').click(function () {
        let index = $(this).index('.nav-item');


        $('.nav-link').removeClass('active');
        $('.nav-link').eq(index).addClass('active');
    });
});
