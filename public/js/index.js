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

    let navbarIndex = $('.nav-link')
    let index = navbarIndex.index();

    navbarIndex.click(function (e) {
        e.preventDefault();

        $(this).eq(index).addClass('active');
    });
})
