<?php

/**
 * Override or insert variables into the page template.
 */
function edeveloper_process_page(&$variables) {

  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}


/**
 * Style the breadcrumb
 * 
 * @param type $variables
 * @return type
 */
function edeveloper_breadcrumb($variables) {
  $sep = ' <span class="seperator">&rsaquo;</span> ';
  if (count($variables['breadcrumb']) > 0) {
    return implode($sep, $variables['breadcrumb']);
  }
  else {
    return t("Home");
  }
}

