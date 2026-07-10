<?php
/**
 * Search form template.
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <label>
    <span class="screen-reader-text"><?php esc_html_e('Search for:', 'easy-visa-myanmar'); ?></span>
    <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search articles...', 'easy-visa-myanmar'); ?>" value="<?php echo get_search_query(); ?>" name="s">
  </label>
  <button type="submit" class="evm-btn evm-btn-primary"><?php esc_html_e('Search', 'easy-visa-myanmar'); ?></button>
</form>
