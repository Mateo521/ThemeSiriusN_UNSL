jQuery(document).ready(function ($) {
    $('#add-image-button').on('click', function () {
        var frame = wp.media({
            title: 'Seleccionar imagen',
            button: { text: 'Usar esta imagen' },
            multiple: false
        });

        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            var imageUrl = attachment.url;
            
            // Solo agregar la imagen si el URL no está vacío
            if (imageUrl) {
                // Pedir al usuario ingresar los valores de la leyenda y el enlace
                var imageCaption = prompt('Introduce la leyenda de la imagen:', 'Texto de la imagen');
                var imageLink = prompt('Introduce el enlace (opcional):', 'https://');
            
                // Asegúrate de que el enlace sea válido o esté vacío si no se ingresa uno
                imageLink = imageLink && imageLink !== 'https://' ? imageLink : '';
            
                $('#swiper-images-container').append(`
                    <div class="swiper-image-row">
                        <input type="hidden" name="swiper_gallery_images[][url]" value="${imageUrl}" />
                        <img src="${imageUrl}" alt="" width="100" height="100" />
                        <input type="text" name="swiper_gallery_images[][caption]" value="${imageCaption}" placeholder="Texto de la imagen" />
                        <input type="url" name="swiper_gallery_images[][link]" value="${imageLink}" placeholder="Enlace del botón Ver más" />
                        <button type="button" class="remove-image-button">Eliminar</button>
                    </div>
                `);                
            }
            
        });

        frame.open();
    });

    $(document).on('click', '.remove-image-button', function () {
        $(this).closest('.swiper-image-row').remove();
    });
});
