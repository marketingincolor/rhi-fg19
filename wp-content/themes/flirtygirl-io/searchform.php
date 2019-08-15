<form role="search" method="get" class="io-search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <div class="grid-x grid-padding-x">
        <div class="large-9 medium-9 small-12 cell">
            <input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
        </div><!-- /.col-sm-2 -->
        <div class=" large-3 medium-3 small-12 cell">
            <input type="submit" class="submit button primary" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
        </div><!-- /.col-sm-2 -->
    </div><!-- /.form-control -->
</form>