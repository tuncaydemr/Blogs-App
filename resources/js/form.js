$(() => {
    $('#active').val();

    $('#active').click(function (e) {
        e.preventDefault();

        $('#active').val('Disable');
    });
})
