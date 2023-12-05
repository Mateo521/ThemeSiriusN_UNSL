<div style="display:flex; justify-content:space-between; align-items:flex-end;">
<p style="margin: 0; padding:2px; font-size:12px;" id="fechaParrafo"></p>
<div class="idioma"></div>
</div>
<form role="search" name="main-search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="text" class="form-control input-search" name="s" placeholder="Buscar" value="<?php echo get_search_query() ?>" />
    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
</form>





