<?php

/**
 * This file is part of LEPTON Core, released under the GNU GPL
 *
 * @function		get_page_headers
 * @author          Website Baker Project, LEPTON Project
 * @copyright       2004-2010 Website Baker Project
 * @copyright       2010-2014 LEPTON Project
 * @link            http://www.LEPTON-cms.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @license_terms   please see LICENSE and COPYING files in your package
 *
 */

// include class.secure.php to protect this file and the whole CMS!
if ( defined( 'LEPTON_PATH' ) )
{
	include( LEPTON_PATH . '/framework/class.secure.php' );
} //defined( 'LEPTON_PATH' )
else
{
	$oneback = "../";
	$root    = $oneback;
	$level   = 1;
	while ( ( $level < 10 ) && ( !file_exists( $root . '/framework/class.secure.php' ) ) )
	{
		$root .= $oneback;
		$level += 1;
	} //( $level < 10 ) && ( !file_exists( $root . '/framework/class.secure.php' ) )
	if ( file_exists( $root . '/framework/class.secure.php' ) )
	{
		include( $root . '/framework/class.secure.php' );
	} //file_exists( $root . '/framework/class.secure.php' )
	else
	{
		trigger_error( sprintf( "[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER[ 'SCRIPT_NAME' ] ), E_USER_ERROR );
	}
}
// end include class.secure.php

	/**
	 * get additions for page header (css, js, meta)
	 *
	 * + gets all active sections for a page;
	 * + scans module directories for file headers.inc.php;
	 * + includes that file if it is available
	 * + includes automatically if exists:
	 *   + module dirs:
	 *     + frontend.css / backend.css              (media: all)
	 *     + ./css/frontend.css / backend.css        (media: all)
	 *     + frontend_print.css / backend_print.css  (media: print)
	 *     + ./css/frontend_print.css / backend_print.css  (media: print)
	 *     + frontend.js / backend.js
	 *     + ./js/frontend.js / backend.js
	 *   + template dir:
	 *     + <PAGE_ID>.css 							 (media: all)
	 *     + ./css/<PAGE_ID>.css					 (media: all)
	 *   + pages_directory:
	 *     + <PAGE_ID>.css                           (media: all)
	 *     + ./css/<PAGE_ID>.css                     (media: all)
	 *
	 * @access public
	 * @param  string  $for - 'frontend' (default) / 'backend'
	 * @param  boolean $print_output
	 * @param  boolean $current_section
	 * @return void (echo's result)
	 *
	 **/
	function get_page_headers( $for = 'frontend', $print_output = true, $individual = false )
	{
		
		global $HEADERS;
		// don't do this twice
		if ( defined( 'LEP_HEADERS_SENT' ) )
		{
			return;
		} //defined( 'LEP_HEADERS_SENT' )
		if ( !$for || $for == '' || ( $for != 'frontend' && $for != 'backend' ) )
		{
			$for = 'frontend';
		} //!$for || $for == '' || ( $for != 'frontend' && $for != 'backend' )
		$page_id = defined( 'PAGE_ID' ) ? PAGE_ID : ( ( isset( $_GET[ 'page_id' ] ) && is_numeric( $_GET[ 'page_id' ] ) ) ? $_GET[ 'page_id' ] : NULL );
		
		// load headers.inc.php for backend theme
		if ( $for == 'backend' )
		{
			if ( file_exists( LEPTON_PATH . '/templates/' . DEFAULT_THEME . '/headers.inc.php' ) )
			{
				__addItems( $for, LEPTON_PATH . '/templates/' . DEFAULT_THEME );
			} //file_exists( LEPTON_PATH . '/templates/' . DEFAULT_THEME . '/headers.inc.php' )
		} //$for == 'backend'
		// load headers.inc.php for backend theme
		else
		{
			if ( file_exists( LEPTON_PATH . '/templates/' . DEFAULT_TEMPLATE . '/headers.inc.php' ) )
			{
				__addItems( $for, LEPTON_PATH . '/templates/' . DEFAULT_TEMPLATE );
			} //file_exists( LEPTON_PATH . '/templates/' . DEFAULT_TEMPLATE . '/headers.inc.php' )
		}
		// handle search
		if ( ( $page_id == 0 ) && ( $for == 'frontend' ) )
		{
			$caller = debug_backtrace();
			if ( isset( $caller[ 2 ][ 'file' ] ) && ( strpos( $caller[ 2 ][ 'file' ], DIRECTORY_SEPARATOR . 'search' . DIRECTORY_SEPARATOR . 'index.php' ) !== false ) )
			{
				// the page is called from the LEPTON SEARCH
				foreach ( array(
					 '/modules/' . SEARCH_LIBRARY . '/templates/custom',
					'/modules/' . SEARCH_LIBRARY . '/templates/default' 
				) as $directory )
				{
					$file = $directory . '/' . $for . '.css';
					if ( file_exists( LEPTON_PATH . '/' . $file ) )
					{
						$HEADERS[ $for ][ 'css' ][] = array(
							 'media' => 'all',
							'file' => $file 
						);
						// load only once
						break;
					} //file_exists( LEPTON_PATH . '/' . $file )
				} //array( '/modules/' . SEARCH_LIBRARY . '/templates/custom', '/modules/' . SEARCH_LIBRARY . '/templates/default' ) as $directory
			} //isset( $caller[ 2 ][ 'file' ] ) && ( strpos( $caller[ 2 ][ 'file' ], DIRECTORY_SEPARATOR . 'search' . DIRECTORY_SEPARATOR . 'index.php' ) !== false )
		} //( $page_id == 0 ) && ( $for == 'frontend' )
		
		// load CSS and JS for DropLEPs
		if ( ( $for == 'frontend' ) && $page_id && is_numeric( $page_id ) )
		{
			if ( file_exists( LEPTON_PATH . '/modules/lib_lepton/pages_load/library.php' ) )
			{
				require_once LEPTON_PATH . '/modules/lib_lepton/pages_load/library.php';
				get_droplep_headers( $page_id );
			} //file_exists( LEPTON_PATH . '/modules/lib_lepton/pages_load/library.php' )
		} //( $for == 'frontend' ) && $page_id && is_numeric( $page_id )
		
		$css_subdirs = array();
		$js_subdirs  = array();
		
		// it's an admin tool...
		if ( $for == 'backend' && isset( $_REQUEST[ 'tool' ] ) && file_exists( LEPTON_PATH . '/modules/' . $_REQUEST[ 'tool' ] . '/tool.php' ) )
		{
			$css_subdirs = array(
				 '/modules/' . $_REQUEST[ 'tool' ],
				'/modules/' . $_REQUEST[ 'tool' ] . '/css' 
			);
			$js_subdirs  = array(
				 '/modules/' . $_REQUEST[ 'tool' ],
				'/modules/' . $_REQUEST[ 'tool' ] . '/js' 
			);
			if ( file_exists( LEPTON_PATH . '/modules/' . $_REQUEST[ 'tool' ] . '/headers.inc.php' ) )
			{
				__addItems( $for, LEPTON_PATH . '/modules/' . $_REQUEST[ 'tool' ] );
			} //file_exists( LEPTON_PATH . '/modules/' . $_REQUEST[ 'tool' ] . '/headers.inc.php' )
		} //$for == 'backend' && isset( $_REQUEST[ 'tool' ] ) && file_exists( LEPTON_PATH . '/modules/' . $_REQUEST[ 'tool' ] . '/tool.php' )
		// if we have a page id...
		elseif ( $page_id && is_numeric( $page_id ) )
		{
			// ... get active sections
			$sections = get_active_sections( $page_id );
			
			if ( count( $sections ) )
			{
				global $current_section;
				global $mod_headers;
				foreach ( $sections as $section )
				{
					$module       = $section[ 'module' ];
					$headers_path = LEPTON_PATH . '/modules/' . $module;
					// special case: 'wysiwyg'
					if ( $for == 'backend' && !strcasecmp( $module, 'wysiwyg' ) )
					{
						// get the currently used WYSIWYG module
						if ( defined( 'WYSIWYG_EDITOR' ) && WYSIWYG_EDITOR != "none" )
						{
							$headers_path = LEPTON_PATH . '/modules/' . WYSIWYG_EDITOR;
						} // defined( 'WYSIWYG_EDITOR' ) && WYSIWYG_EDITOR != "none"
					} // $for == 'backend' && !strcasecmp( $module, 'wysiwyg' )
					// find header definition file
					if ( file_exists( $headers_path . '/headers.inc.php' ) )
					{
						$current_section = $section[ 'section_id' ];
						__addItems( $for, $headers_path );
					} //file_exists( $headers_path . '/headers.inc.php' )
					else
					{
						
					}
					$css_subdirs = array(
						 '/modules/' . $module,
						'/modules/' . $module . '/css' 
					);
					$js_subdirs  = array(
						 '/modules/' . $module,
						'/modules/' . $module . '/js' 
					);
				} // foreach ($sections as $section)
			} // if (count($sections))
			
			// add css/js search subdirs for frontend only; page based CSS/JS
			// does not make sense in BE
			if ( $for == 'frontend' )
			{
				array_push( $css_subdirs, PAGES_DIRECTORY, PAGES_DIRECTORY . '/css' );
				array_push( $js_subdirs, PAGES_DIRECTORY, PAGES_DIRECTORY . '/js' );
			} //$for == 'frontend'
			
		} // if ( $page_id )
		
		// add template css
		// note: defined() is just to avoid warnings, the NULL does not really
		// make sense!
		$subdir = ( $for == 'backend' ) ? ( defined( 'DEFAULT_THEME' ) ? DEFAULT_THEME : NULL ) : ( defined( 'TEMPLATE' ) ? TEMPLATE : NULL );

		// automatically add CSS files
		foreach ( $css_subdirs as $directory )
		{
			// frontend.css / backend.css
			$file = $directory . '/' . $for . '.css';
			if ( file_exists( LEPTON_PATH . '/' . $file ) )
			{
				$HEADERS[ $for ][ 'css' ][] = array(
					 'media' => 'all',
					'file' => $file 
				);
			} //file_exists( LEPTON_PATH . '/' . $file )
			// frontend_print.css / backend_print.css
			$file = $directory . '/' . $for . '_print.css';
			if ( file_exists( LEPTON_PATH . '/' . $file ) )
			{
				$HEADERS[ $for ][ 'css' ][] = array(
					 'media' => 'print',
					'file' => $file 
				);
			} //file_exists( LEPTON_PATH . '/' . $file )
		} //$css_subdirs as $directory
		// automatically add JS files
		foreach ( $js_subdirs as $directory )
		{
			$file = $directory . '/' . $for . '.js';
			if ( file_exists( LEPTON_PATH . '/' . $file ) )
			{
				$HEADERS[ $for ][ 'js' ][] = $file;
			} //file_exists( LEPTON_PATH . '/' . $file )
		} //$js_subdirs as $directory
		$output = null;
		foreach ( array(
			 'meta',
			'css',
			'jquery',
			'js' 
		) as $key )
		{
			if ( !isset( $HEADERS[ $for ][ $key ] ) || !is_array( $HEADERS[ $for ][ $key ] ) )
			{
				continue;
			} //!isset( $HEADERS[ $for ][ $key ] ) || !is_array( $HEADERS[ $for ][ $key ] )
			
			foreach ( $HEADERS[ $for ][ $key ] as $i => $arr )
			{
				switch ( $key )
				{
					case 'meta':
						if ( is_array( $arr ) )
						{
							foreach ( $arr as $item )
							{
								$output .= $item . "\n";
							} //$arr as $item
						} //is_array( $arr )
						break;
					case 'css':
						// make sure we have an URI (LEPTON_URL included)
						$file = ( preg_match( '#' . LEPTON_URL . '#i', $arr[ 'file' ] ) ? $arr[ 'file' ] : LEPTON_URL . '/' . $arr[ 'file' ] );
						$output .= '<link rel="stylesheet" type="text/css" href="' . $file . '" media="' . ( isset( $arr[ 'media' ] ) ? $arr[ 'media' ] : 'all' ) . '" />' . "\n";
						break;
					case 'jquery':
						// make sure that we load the core if needed, even if the
						// author forgot to set the flags
						if ( ( isset( $arr[ 'ui' ] ) && $arr[ 'ui' ] === true ) || ( isset( $arr[ 'ui-effects' ] ) && is_array( $arr[ 'ui-effects' ] ) ) || ( isset( $arr[ 'ui-components' ] ) && is_array( $arr[ 'ui-components' ] ) ) )
						{
							$arr[ 'core' ] = true;
						} //( isset( $arr[ 'ui' ] ) && $arr[ 'ui' ] === true ) || ( isset( $arr[ 'ui-effects' ] ) && is_array( $arr[ 'ui-effects' ] ) ) || ( isset( $arr[ 'ui-components' ] ) && is_array( $arr[ 'ui-components' ] ) )
						// make sure we load the ui core if needed
						if ( isset( $arr[ 'ui-components' ] ) && is_array( $arr[ 'ui-components' ] ) || ( isset( $arr[ 'ui-effects' ] ) && is_array( $arr[ 'ui-effects' ] ) ) )
						{
							$arr[ 'ui' ] = true;
						} //isset( $arr[ 'ui-components' ] ) && is_array( $arr[ 'ui-components' ] ) || ( isset( $arr[ 'ui-effects' ] ) && is_array( $arr[ 'ui-effects' ] ) )
						if ( isset( $arr[ 'ui-effects' ] ) && is_array( $arr[ 'ui-effects' ] ) && ( !in_array( 'core', $arr[ 'ui-effects' ] ) ) )
						{
							array_unshift( $arr[ 'ui-effects' ], 'core' );
						} //isset( $arr[ 'ui-effects' ] ) && is_array( $arr[ 'ui-effects' ] ) && ( !in_array( 'core', $arr[ 'ui-effects' ] ) )
						// load the components
						if ( isset( $arr[ 'ui-theme' ] ) && file_exists( LEPTON_PATH . '/modules/lib_jquery/jquery-ui/themes/' . $arr[ 'ui-theme' ] ) )
						{
							$output .= '<link rel="stylesheet" type="text/css" href="' . LEPTON_URL . '/modules/lib_jquery/jquery-ui/themes/' . $arr[ 'ui-theme' ] . '/jquery-ui.css' . '" media="all" />' . "\n";
						} //isset( $arr[ 'ui-theme' ] ) && file_exists( LEPTON_PATH . '/modules/lib_jquery/jquery-ui/themes/' . $arr[ 'ui-theme' ] )
						if ( isset( $arr[ 'core' ] ) && $arr[ 'core' ] === true )
						{
							$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/modules/lib_jquery/jquery-core/jquery-core.min.js' . '"></script>' . "\n";
						} //isset( $arr[ 'core' ] ) && $arr[ 'core' ] === true
						if ( isset( $arr[ 'ui' ] ) && $arr[ 'ui' ] === true )
						{
							$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/modules/lib_jquery/jquery-ui/ui/jquery.ui.core.min.js' . '"></script>' . "\n";
						} //isset( $arr[ 'ui' ] ) && $arr[ 'ui' ] === true
						if ( isset( $arr[ 'ui-effects' ] ) && is_array( $arr[ 'ui-effects' ] ) )
						{
							foreach ( $arr[ 'ui-effects' ] as $item )
							{
								$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/modules/lib_jquery/jquery-ui/ui/jquery.effects.' . $item . '.min.js' . '"></script>' . "\n";
							} //$arr[ 'ui-effects' ] as $item
						} //isset( $arr[ 'ui-effects' ] ) && is_array( $arr[ 'ui-effects' ] )
						if ( isset( $arr[ 'ui-components' ] ) && is_array( $arr[ 'ui-components' ] ) )
						{
							foreach ( $arr[ 'ui-components' ] as $item )
							{
								$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/modules/lib_jquery/jquery-ui/ui/jquery.ui.' . $item . '.min.js' . '"></script>' . "\n";
							} //$arr[ 'ui-components' ] as $item
						} //isset( $arr[ 'ui-components' ] ) && is_array( $arr[ 'ui-components' ] )
						if ( isset( $arr[ 'all' ] ) && is_array( $arr[ 'all' ] ) )
						{
							foreach ( $arr[ 'all' ] as $item )
							{
								$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/modules/lib_jquery/plugins/' . $item . '/' . $item . '.js' . '"></script>' . "\n";
							} //$arr[ 'all' ] as $item
						} //isset( $arr[ 'all' ] ) && is_array( $arr[ 'all' ] )
						if ( isset( $arr[ 'individual' ] ) && is_array( $arr[ 'individual' ] ) )
						{
							foreach ( $arr[ 'individual' ] as $section_name => $item )
							{
								if ( $section_name == strtolower( $individual ) )
								{
									$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/modules/lib_jquery/plugins/' . $item . '/' . $item . '.js' . '"></script>' . "\n";
								} //$section_name == strtolower( $individual )
							} //$arr[ 'individual' ] as $section_name => $item
						} //isset( $arr[ 'individual' ] ) && is_array( $arr[ 'individual' ] )
						break;
					case 'js':
						if ( is_array( $arr ) )
						{
							if ( isset( $arr[ 'all' ] ) )
							{
								foreach ( $arr[ 'all' ] as $item )
								{
									$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/templates/' . DEFAULT_THEME . '/js/' . $item . '"></script>' . "\n";
								} //$arr[ 'all' ] as $item
							} //isset( $arr[ 'all' ] )
							if ( isset( $arr[ 'individual' ] ) )
							{
								foreach ( $arr[ 'individual' ] as $section_name => $item )
								{
									if ( $section_name == strtolower( $individual ) )
									{
										$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/templates/' . DEFAULT_THEME . '/js/' . $item . '"></script>' . "\n";
									} //$section_name == strtolower( $individual )
								} //$arr[ 'individual' ] as $section_name => $item
							} //isset( $arr[ 'individual' ] )
						} //is_array( $arr )
						else
						{
							$output .= '<script type="text/javascript" src="' . LEPTON_URL . '/' . $arr . '"></script>' . "\n";
						}
						break;
					default:
						trigger_error( 'Unknown header type [' . $key . ']!', E_USER_NOTICE );
						break;
				} //$key
			} //$HEADERS[ $for ][ $key ] as $i => $arr
		} //array( 'meta', 'css', 'jquery', 'js' ) as $key
		// foreach( array( 'meta', 'css', 'js' ) as $key )
		if ( true == $print_output )
		{
			echo $output;
			define( 'LEP_HEADERS_SENT', true );
		} //true == $print_output
		else
		{
			return $output;
		}
		
	} // end function get_page_headers()

?>