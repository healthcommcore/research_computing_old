<?php

/**
 * @file
 * template.php
 */

/**
 * Implements hook_preprocess_page().
 */
function labtheme_preprocess_page(&$variables) {
  if (!empty($variables['page']['left_column'])) {
    $variables['content_column_class'] = ' class="col-sm-9"';
  }
  if (!empty($variables['page']['right_column'])) {
    $variables['content_column_class'] = ' class="col-sm-9"';
  }
	if ( isset($variables['navbar_classes_array']) ) {
		if ($index = array_search('container', $variables['navbar_classes_array']) ) {
			array_splice( $variables['navbar_classes_array'], $index, 1);
		}
	}
}

/**
 * Implements hook_menu_link
 */
function labtheme_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ( (!empty($element['#original_link']['depth'])) ) {
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      if ($element['#original_link']['depth'] == 1) {
        $element['#localized_options']['attributes']['data-hover'] = 'dropdown';
      }
      else if ($element['#original_link']['depth'] > 1) {
        $element['#attributes']['class'][] = 'dropdown';
      }
      // Add our own wrapper.
      // Generate as standard dropdown.
      //$element['#title'] .= ' <span class="caret"></span>';
      $element['#localized_options']['html'] = TRUE;

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
			/*
      $element['#localized_options']['attributes']['data-target'] = '#';
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
			 */
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
