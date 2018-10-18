<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $html_attributes:  String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: An array of attribute values for the HTML element.
 *   It is flattened into a string within the variable $html_attributes.
 * - $body_attributes:  String of attributes for the BODY element. It can be
 *   manipulated through the variable $body_attributes_array from preprocess
 *   functions.
 * - $body_attributes_array: An array of attribute values for the BODY element.
 *   It is flattened into a string within the variable $body_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup templates
 */
?><!DOCTYPE html>
<html<?php print $html_attributes;?><?php print $rdf_namespaces;?>>
<head>
  <link rel="profile" href="<?php print $grddl_profile; ?>" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lte IE 11]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php print $scripts; ?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64803923-2', 'auto');
  ga('send', 'pageview');

</script>
</head>
  <!--[if lt IE 9]>
    <body class="<?php print $classes . ' ieclass'; ?>" <?php print $attributes;?>>
  <![endif]-->
  <!--[if !IE]>-->
<body<?php print $body_attributes; ?>>
  <!--<![endif]-->

  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

<!-- Popup window for external links -->
<script>
(function($){
	var extLinks = $('.popup');
	var width = $(window).width() / 1.5;
	var height = $(window).height();
	var xPos = window.screenX + (window.outerWidth - width) / 2;
	var yPos = window.screenY + (window.outerHeight - height) / 2;;
	var options = "scrollbars, resizable, menubar, toolbar, status=0 ,location," + 
		"height=" + height + ",width=" + width + 
		",top=" + yPos + ",left=" + xPos;
	for(var i = 0; i < extLinks.length; i++){
		extLinks[i].onclick = function(){
			window.open(this.href, this.value, options);
			return false;
		}
	}
})(jQuery);

// Get rid of hover menu in mobile view
(function($) {
  if( $(window).width() < 768 ) {
    $('.main-menu').find('a[data-hover="dropdown"]').each(function() {
      $(this).attr('data-hover', '');
    });
  }
})(jQuery);

/* Really ugly hack to match homepage right column to size of page */
(function($){
  if( $(window).width() > 767 && $('.home-menu').length > 0) {
    var page_height = $('.homepage').height();
    var right_col = $('.home-menu');
    var top_value = right_col.css('top').slice(0, -2) * -1;
    var actual_height = page_height + top_value;
    right_col.height(actual_height + 'px');
  }
  /*
   */
})(jQuery);
</script>

</body>
</html>
