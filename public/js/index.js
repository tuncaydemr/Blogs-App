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

    let button = $('#like-button');

    button.click(() => {
        $.post('/blogs', (response) => {
            $('#current-number').text(response.blog['likes']);
        })
    })
})
