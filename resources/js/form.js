$(() => {
    let checkbox = $('#active');
    let label = $('label[for=active]');

    checkbox.on('change', () => {
        if(checkbox.is(':checked')) {
            label.text('Active');
        } else {
            label.text('Disable');
        }
    });
})
