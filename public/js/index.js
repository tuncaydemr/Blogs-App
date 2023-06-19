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

    $("#sort-by-likes").on("change", () => {
        let selectedOption = $(this).val();

        $.ajax({
            type: "GET",
            url: "{{ route('sortByRate') }}",
            data: { sort: selectedOption },
            success: function (response) {
                $(this).html(response);
            },
        });
    });
})
