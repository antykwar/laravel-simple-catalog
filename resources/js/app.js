$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.img-product').on('click', function() {
        let image = $(this),
            imageId = image.data('id'),
            postUrl = image.data('url');

        if (!confirm('Delete this image?')) {
            return;
        }

        $.post(
            postUrl,
            {imageId: imageId},
            function() {
                document.location.reload();
            }
        );
    });
});
