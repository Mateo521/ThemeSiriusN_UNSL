<div  class="menu-p">
    <div style="padding:0 15px; display:flex; justify-content:center; align-items:center; gap: 10px;">

        <div class="container4">
            <form role="search" name="main-search" method="get" class="search1" action="<?php echo esc_url(home_url('/')); ?>">
                <input class="search__input" type="search" name="s" placeholder="Buscar" id="searchInput" value="<?php echo get_search_query() ?>">

                <div class="search__icon-container">
                    <label for="searchInput" class="search__label" aria-label="Search">
                        <svg viewBox="0 0 1000 1000" title="Search">
                            <path fill="currentColor" d="M408 745a337 337 0 1 0 0-674 337 337 0 0 0 0 674zm239-19a396 396 0 0 1-239 80 398 398 0 1 1 319-159l247 248a56 56 0 0 1 0 79 56 56 0 0 1-79 0L647 726z" />
                        </svg>
                    </label>

                    <button class="search__submit" aria-label="Search">
                        <svg viewBox="0 0 1000 1000" title="Search">
                            <path fill="currentColor" d="M408 745a337 337 0 1 0 0-674 337 337 0 0 0 0 674zm239-19a396 396 0 0 1-239 80 398 398 0 1 1 319-159l247 248a56 56 0 0 1 0 79 56 56 0 0 1-79 0L647 726z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="idioma"></div>
    </div>
    <img style="height:100%;" src="https://scivz.unsl.edu.ar/noticias/wp-content/uploads/2024/03/logoheaderright5e1f.jpg" alt="">
</div>
<!--form role="search" name="main-search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" class="form-control input-search" name="s" placeholder="Buscar" value="<?php echo get_search_query() ?>" />
    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
</form-->




<style>
    .menu-p{
    display:flex;
    }
    @media screen and (max-width:766px){
        .menu-p{
            display:none;

}
    }
    
    .widget_search{
margin:0 !important;
    }
    .idioma select {
        border: none;
    }

    :root {
        --color-background: #fff;
        --color-foreground: #000;
      
    }

    .container4 {
        align-items: center;
        background: var(--color-background);
        display: flex;
        height: 35px;
        justify-content: center;
    }

    .search1 {
        --easing: cubic-bezier(0.4, 0, 0.2, 1);
        --font-size: 2rem;
        --color: black;
        --color-highlight: grey;
        --transition-time-icon: 0.2s;
        --transition-time-input: 0.3s 0.25s;
        border-radius: 999px;
        border: 2px solid transparent;
        display: flex;
        transition: border-color var(--transition-time-icon) linear, padding var(--transition-time-input) var(--easing);
    }

    .search1:not(:focus-within) {
        --transition-time-input: 0.2s 0s;
    }

    @media (prefers-reduced-motion: reduce) {
        .search1 {
            --transition-time-icon: 0s !important;
            --transition-time-input: 0s !important;
        }
    }

    .search__input {
        background: transparent;
        border: none;
        color: black;
        font-size: var(--font-size);
        opacity: 0;
        outline: none;
        padding: 0;
        transition: width var(--transition-time-input) var(--easing), padding var(--transition-time-input) var(--easing), opacity var(--transition-time-input) linear;
        width: 0;
    }

    .search__input::-moz-placeholder {
        color: var(--color);
        opacity: 0.75;
    }

    .search__input:-ms-input-placeholder {
        color: var(--color);
        opacity: 0.75;
    }

    .search__input::placeholder {
        color: var(--color);
        opacity: 0.75;
    }

    .search__icon-container {
        height: 30px;
        position: relative;
        width: 30px;
    }

    .search__label,
    .search__submit {
        color: var(--color);
        cursor: pointer;
        display: block;
        height: 100%;
        padding: 0;
        position: absolute;
        width: 100%;
    }

    .search__label:hover,
    .search__label:focus,
    .search__label:active,
    .search__submit:hover,
    .search__submit:focus,
    .search__submit:active {
        color: #1D70B7;
    }

    .search__label {
        transition: transform var(--transition-time-icon) var(--easing), color 0.1s;
    }

    .search__submit {
        background: none;
        border-radius: 50%;
        border: none;
        box-shadow: 0 0 0 4px inset transparent;
        display: none;
        outline: none;
        transition: color 0.1s, box-shadow 0.1s;
    }

    .search__submit svg {
        transform: scale(0.5);
    }

    .search__submit:focus {
        box-shadow: 0 0 0 4px inset var(--color-highlight);
    }

    .search1:focus-within {
        border-color: #1D70B7;
    }

    .search1:focus-within .search__input {
        opacity: 1;
        padding: 0 1rem 0 2rem;
        width: calc(var(--font-size) * 12);
    }

    .search1:focus-within .search__label {
        transform: scale(0.5);
    }

    .search1:focus-within .search__submit {
        -webkit-animation: unhide var(--transition-time-icon) steps(1, end);
        animation: unhide var(--transition-time-icon) steps(1, end);
        display: block;
    }

    @-webkit-keyframes unhide {
        from {
            height: 0;
            opacity: 0;
        }

        to {
            height: auto;
            opacity: 1;
        }
    }

    @keyframes unhide {
        from {
            height: 0;
            opacity: 0;
        }

        to {
            height: auto;
            opacity: 1;
        }
    }



</style>