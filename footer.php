<footer style=" padding: 15px; color: white; background-color:#104b7d;">
    <div class="contenedor">
        <div class="imagenesfooter">

            <div>
                <a target="_blank" href="https://www.unsl.edu.ar/">
                    <img style="max-width: 225px; width:100%; padding:10px; " src="<?php echo esc_url(get_site_url()); ?>/wp-content/uploads/2024/03/isologo_unsl_blanco.png" alt="">
                </a>
            </div>


            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img style="max-width: 225px; width:100%; padding:10px;" src="<?php echo esc_url(get_site_url()); ?>/wp-content/uploads/2024/03/logo-noticias-texto-blanco-1.png" alt="">
                </a>
            </div>


            <ul class='socialfooter'>
                <li class='facebook'>
                    <a href="https://www.facebook.com/noticias.unsl/?locale=es_LA" target="_blank">
                        <i class='fab fab-lg fa-facebook'></i>
                    </a>


                </li>
                <li class='twitter'>
                    <a href="https://twitter.com/noticiasUNSL/" target="_blank">
                        <i class='fab fab-lg fa-twitter'></i>
                    </a>
                </li>
                <li class='instagram'>
                    <a href="https://www.instagram.com/unslactiva/?hl=es" target="_blank">
                        <i class='fab fab-lg fa-instagram'></i>
                    </a>
                </li>
                <li class='tiktok'>
                    <a href="https://www.tiktok.com/@unslactiva?lang=es" target="_blank">
                        <i class='fab fab-lg fa-tiktok'></i>
                    </a>
                </li>
            </ul>






        </div>

        <div class="contenidosfooter">
            <div>
                <h3 style="margin:0 0 5px 0;">Información institucional</h3>

                <p>
                    <b> Teléfono:</b> +54 (0266) 4520300 - 4530000
                </p>

                <p>
                    <b> Dirección:</b> Ejército de Los Andes 950, San Luis, Argentina
                </p>
            </div>
            <div>
                <h3 style="margin:0 0 5px 0;">Contacto</h3>

                <p>
                    <b> Teléfono:</b> +54 (0266) 4520300 - 4530000
                </p>

                <p>
                    <b> Interno:</b> 5216
                </p>

                <p>
                    <b>Ubicación:</b> 2° Piso Edificio Rectorado - Ala A
                </p>
                <p><b> ¿Cómo llegar?</b>  <a style="color: white;" href="https://goo.gl/maps/JfpaQGqv7zH2" target="_blank">Ver úbicación en Google Maps</a></p>

                <p>
                    <b>Email:</b> <a style="color: white;" href="mailto:prensa@unsl.edu.ar">prensa@unsl.edu.ar</a> 
                </p>
            </div>
            <div>
                <h3 style="margin:0 0 5px 0;">Mapa del sitio</h3>
                <div style="display: flex; flex-direction: column;">
                    <?php
                    if (has_nav_menu('footer')) {
                        wp_nav_menu(array('theme_location' => 'footer', 'depth' => 1, 'container' => '', 'menu_class' => 'footer-menu'));
                    }
                    ?>


                </div>
            </div>

        </div>
        <hr>

        <p style="margin: 0;">Diseño y desarrollo a cargo de la Secretaría de Comunicación Institucional - Versión 1.3.0 - Contacto: <a style="color:white;" href="mailto:sci@unsl.edu.ar">sci@unsl.edu.ar</a></p>
    </div>
</footer>

<?php wp_footer(); ?>
<style>
    .imagenesfooter {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 0 35px 0;
    }

    .menubfooter {
        display: grid;
        gap: 0 15px;
        grid-template-columns: repeat(4, 1fr);
        justify-content: center;
    }

    .categoriasfooter {
        display: grid;
        grid-template-columns: 1fr 1fr;
        justify-content: center;
    }

    .contenidosfooter {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        justify-items: center;

    }

    @media screen and (max-width:808px) {

        .imagenesfooter {
            flex-direction: column;
        }

        .contenidosfooter {
            grid-template-columns: 1fr;
            justify-items: start;
        }

        .categoriasfooter {

            grid-template-columns: 1fr;

        }

        .menubfooter {
            grid-template-columns: 1fr;
        }
    }

    footer {
        font-family: "Libre Franklin", sans-serif;
        font-optical-sizing: auto;
        font-weight: normal;
        font-style: normal;
    }

    .footer-menu a {
        color: white;
    }

    .socialfooter {
        margin: 0;
        text-align: center;
        position: relative;

        padding: 5px 15px;
    }

    .socialfooter li {
        list-style-type: none;
        display: inline-block;
        margin: 0 0 0 -10px;
        padding: 0;
    }

    .socialfooter li a {
        text-align: center;
        color: #444444;
    }

    .socialfooter li a i {
        display: inline-block;
        font-size: 0;
        line-height: 1;
        cursor: pointer;
        padding: 10px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        position: relative;
        color: #fff;
        z-index: 1;
        transition: all 0.2s ease-in-out;
    }

    .socialfooter li a i:before {
        font-size: 20px;
        z-index: 2;
        position: relative;
    }

    .socialfooter li a i:after {
        opacity: 0;
        pointer-events: none;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        border-radius: 100%;
        content: "";
        transform: scale(0.2);
        transition: all 0.2s ease-in-out;
    }

    .socialfooter li a i:hover {
        color: #ffffff;
    }

    .socialfooter li a i:hover:after {
        transform: scale(1);
        opacity: 1;
    }

    .socialfooter .facebook .fa:after {
        background: #3b5998;
    }

    .socialfooter .twitter .fa:after {
        background: #55acee;
    }

    .socialfooter .instagram .fa:after {
        background: #125688;
    }

    .socialfooter .tiktok .fa:after {
        background: #007bb5;
    }

    .socialfooter .rss .fa:after {
        background: #ff6600;
    }


    .related-post {
        padding: 10px;
        margin: 5px;

        /*
        background-color: white;
        */
        border: solid whitesmoke 1px;
    }

    .related-posts {
        grid-template-columns: repeat(4, 1fr);
    }

    @media screen and (max-width:766px) {

        .related-posts {

            grid-template-columns: 1fr;
        }
    }
</style>



</body>

</html>