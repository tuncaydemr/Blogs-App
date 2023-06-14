$(() => {
    $('#active').val();

    $('#active').on('change', () => {
        if($('#active').is(':checked')) {
            $(this).val('Active');
        } else {
            $(this).val('Disable');
        }
    });
})
