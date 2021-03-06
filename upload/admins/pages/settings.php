<?php

/**
 * This file is part of LEPTON Core, released under the GNU GPL
 * Please see LICENSE and COPYING files in your package for details, specially for terms and warranties.
 * 
 * NOTICE:LEPTON CMS Package has several different licenses.
 * Please see the individual license in the header of each single file or info.php of modules and templates.
 *
 * @author          Website Baker Project, LEPTON Project
 * @copyright       2004-2010 Website Baker Project
 * @copyright       2010-2016 LEPTON Project
 * @link            http://www.LEPTON-cms.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @license_terms   please see LICENSE and COPYING files in your package
 *
 */
 
// include class.secure.php to protect this file and the whole CMS!
if (defined('LEPTON_PATH')) {	
	include(LEPTON_PATH.'/framework/class.secure.php'); 
} else {
	$oneback = "../";
	$root = $oneback;
	$level = 1;
	while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
		$root .= $oneback;
		$level += 1;
	}
	if (file_exists($root.'/framework/class.secure.php')) { 
		include($root.'/framework/class.secure.php'); 
	} else {
		trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
	}
}
// end include class.secure.php



// Get page id
if(!isset($_GET['page_id']) OR !is_numeric($_GET['page_id']))
{
	header("Location: index.php");
	exit(0);
} else {
	$page_id = $_GET['page_id'];
}

require_once(LEPTON_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages_settings');

// Include the functions file
require_once(LEPTON_PATH.'/framework/summary.utf8.php');

// Get perms
$sql = 'SELECT * FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$page_id;
$results = $database->query($sql);
$results_array = $results->fetchRow();

$old_admin_groups = explode(',', $results_array['admin_groups']);
$old_admin_users = explode(',', $results_array['admin_users']);

$in_old_group = FALSE;
foreach($admin->get_groups_id() as $cur_gid)
{
	if (in_array($cur_gid, $old_admin_groups))
    {
		$in_old_group = TRUE;
	}
}
if((!$in_old_group) AND !is_numeric(array_search($admin->get_user_id(), $old_admin_users)))
{
	$admin->print_error($MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS']);
}

// Get page details
$sql = 'SELECT * FROM `'.TABLE_PREFIX.'pages` WHERE `page_id`='.$page_id;
$results = $database->query($sql);
if($database->is_error()) {
	$admin->print_header();
	$admin->print_error($database->get_error());
}
if($results->numRows() == 0) {
	$admin->print_header();
	$admin->print_error($MESSAGE['PAGES_NOT_FOUND']);
}
$results_array = $results->fetchRow();

// Get display name of person who last modified the page
$user=$admin->get_user_details($results_array['modified_by']);

// Get Page Extension (Filename Suffix)
$database = new database();
$query = "SELECT * FROM ".TABLE_PREFIX."settings WHERE name = 'page_extension'";
$result = $database->query($query);
$result_array_extension = $result->fetchRow();

// Convert the unix ts for modified_when to human a readable form
if($results_array['modified_when'] != 0)
{
	$modified_ts = date(TIME_FORMAT.', '.DATE_FORMAT, $results_array['modified_when']);
} else {
	$modified_ts = 'Unknown';
}

// Setup template object, parse vars to it, then parse it
$template = new Template(THEME_PATH.'/templates');
$template->set_file('page', 'pages_settings.htt');
$template->set_block('page', 'main_block', 'main');

$template->set_var(array(
		'PAGE_ID' => $results_array['page_id'],
		'PAGE_TITLE' => ($results_array['page_title']),
		'MENU_TITLE' => ($results_array['menu_title']),
		'PAGE_LINK' => substr($results_array['link'],strripos($results_array['link'],'/')+1),
		'PAGE_EXTENSION' => ($result_array_extension['value']),    
		'DESCRIPTION' => ($results_array['description']),
		'KEYWORDS' => ($results_array['keywords']),
    'PAGE_CODE' => ($results_array['page_code']),
		'MODIFIED_BY' => $user['display_name'],
		'MODIFIED_BY_USERNAME' => $user['username'],
		'MODIFIED_WHEN' => $modified_ts,
		'ADMIN_URL' => ADMIN_URL,
		'LEPTON_URL' => LEPTON_URL,
		'LEPTON_PATH' => LEPTON_PATH,
		'THEME_URL' => THEME_URL
		)
);

// Work-out if we should show the "manage sections" link
$sql = 'SELECT `section_id` FROM `'.TABLE_PREFIX.'sections` WHERE `page_id`='.$page_id.' AND `module`="menu_link"';
$query_sections = $database->query($sql);
if($query_sections->numRows() > 0)
{
    $template->set_var('DISPLAY_MANAGE_SECTIONS', 'display:none;');
} elseif(MANAGE_SECTIONS == 'enabled')
{
	$template->set_var('TEXT_MANAGE_SECTIONS', $HEADING['MANAGE_SECTIONS']);
} else {
	$template->set_var('DISPLAY_MANAGE_SECTIONS', 'display:none;');
}

// Visibility
if($results_array['visibility'] == 'public') {
	$template->set_var('PUBLIC_SELECTED', ' selected="selected"');
} elseif($results_array['visibility'] == 'private') {
	$template->set_var('PRIVATE_SELECTED', ' selected="selected"');
} elseif($results_array['visibility'] == 'registered') {
	$template->set_var('REGISTERED_SELECTED', ' selected="selected"');
} elseif($results_array['visibility'] == 'hidden') {
	$template->set_var('HIDDEN_SELECTED', ' selected="selected"');
} elseif($results_array['visibility'] == 'none') {
	$template->set_var('NO_VIS_SELECTED', ' selected="selected"');
}
// Group list 1 (admin_groups)
	$admin_groups = explode(',', str_replace('_', '', $results_array['admin_groups']));

	$sql = 'SELECT * FROM `'.TABLE_PREFIX.'groups`';
    $get_groups = $database->query($sql);

	$template->set_block('main_block', 'group_list_block', 'group_list');
	// Insert admin group and current group first
	$admin_group_name = $get_groups->fetchRow();
	$template->set_var(array(
			'ID' => 1,
			'TOGGLE' => '',
			'DISABLED' => ' disabled="disabled"',
			'LINK_COLOR' => '000000',
			'CURSOR' => 'default',
			'NAME' => $admin_group_name['name'],
			'CHECKED' => ' checked="checked"'
		)
	);
	$template->parse('group_list', 'group_list_block', true);
	while($group = $get_groups->fetchRow()) {
		// check if the user is a member of this group
		$flag_disabled = '';
		$flag_checked =  '';
		$flag_cursor =   'pointer';
		$flag_color =    '';
		if (in_array($group["group_id"], $admin->get_groups_id())) {
			$flag_disabled = ''; //' disabled';
			$flag_checked =  ''; //' checked';
			$flag_cursor =   'default';
			$flag_color =    '000000';
		}

		// Check if the group is allowed to edit pages
		$system_permissions = explode(',', $group['system_permissions']);
		if(is_numeric(array_search('pages_modify', $system_permissions))) {
			$template->set_var(array(
					'ID' => $group['group_id'],
					'TOGGLE' => $group['group_id'],
					'DISABLED' => $flag_disabled,
					'LINK_COLOR' => $flag_color,
					'CURSOR' => $flag_cursor,
					'NAME' => $group['name'],
					'CHECKED' => $flag_checked
				)
			);
			if(is_numeric(array_search($group['group_id'], $admin_groups))) {
				$template->set_var('CHECKED', ' checked="checked"');
			} else {
				if (!$flag_checked) $template->set_var('CHECKED', '');
			}
			$template->parse('group_list', 'group_list_block', true);
		}
	}
// Group list 2 (viewing_groups)
	$viewing_groups = explode(',', str_replace('_', '', $results_array['viewing_groups']));

    $sql = 'SELECT * FROM `'.TABLE_PREFIX.'groups`';
    $get_groups = $database->query($sql);

	$template->set_block('main_block', 'group_list_block2', 'group_list2');
	// Insert admin group and current group first
	$admin_group_name = $get_groups->fetchRow();
	$template->set_var(array(
			'ID' => 1,
			'TOGGLE' => '',
			'DISABLED' => ' disabled="disabled"',
			'LINK_COLOR' => '000000',
			'CURSOR' => 'default',
			'NAME' => $admin_group_name['name'],
			'CHECKED' => ' checked="checked"'
		)
	);
	$template->parse('group_list2', 'group_list_block2', true);

	while($group = $get_groups->fetchRow())
    {
		// check if the user is a member of this group
		$flag_disabled = '';
		$flag_checked =  '';
		$flag_cursor =   'pointer';
		$flag_color =    '';
		if (in_array($group["group_id"], $admin->get_groups_id()))
        {
			$flag_disabled = ''; //' disabled';
			$flag_checked =  ''; //' checked';
			$flag_cursor =   'default';
			$flag_color =    '000000';
		}

		$template->set_var(array(
				'ID' => $group['group_id'],
				'TOGGLE' => $group['group_id'],
				'DISABLED' => $flag_disabled,
				'LINK_COLOR' => $flag_color,
				'CURSOR' => $flag_cursor,
				'NAME' => $group['name'],
				'CHECKED' => $flag_checked
			)
		);
		if(is_numeric(array_search($group['group_id'], $viewing_groups)))
        {
			$template->set_var('CHECKED', 'checked="checked"');
		} else {
			if (!$flag_checked) {$template->set_var('CHECKED', '');}
		}

		$template->parse('group_list2', 'group_list_block2', true);

	}

// Show private viewers
if($results_array['visibility'] == 'private' OR $results_array['visibility'] == 'registered')
{
	$template->set_var('DISPLAY_VIEWERS', '');
} else {
	$template->set_var('DISPLAY_VIEWERS', 'display:none;');
}

// Parent page list
function parent_list($parent)
{
	global $admin, $database, $template, $results_array,$field_set;

    $sql = 'SELECT * FROM `'.TABLE_PREFIX.'pages` WHERE `parent` = '.$parent.' ORDER BY `position` ASC';
    $get_pages = $database->query($sql);

	while(false !== ($page = $get_pages->fetchRow() ) )
    {
		if($admin->page_is_visible($page)==false)
        {
          continue;
        }

		// if parent = 0 set flag_icon
		$template->set_var('FLAG_ROOT_ICON',' none ');
		if( $page['parent'] == 0  && $field_set)
        {
			$template->set_var('FLAG_ROOT_ICON','url('.THEME_URL.'/images/flags/'.strtolower($page['language']).'.png)');
		}
		// If the current page cannot be parent, then its children neither
		$list_next_level = true;
		// Stop users from adding pages with a level of more than the set page level limit
		if($page['level']+1 < PAGE_LEVEL_LIMIT)
        {
			// Get user perms
			$admin_groups = explode(',', str_replace('_', '', $page['admin_groups']));
			$admin_users = explode(',', str_replace('_', '', $page['admin_users']));
			$in_group = FALSE;
			foreach($admin->get_groups_id() as $cur_gid)
            {
				if (in_array($cur_gid, $admin_groups))
                {
					$in_group = TRUE;
				}
			}
			if(($in_group) OR is_numeric(array_search($admin->get_user_id(), $admin_users)))
            {
				$can_modify = true;
			} else {
				$can_modify = false;
			}
			// Title -'s prefix
			$title_prefix = '';
			for($i = 1; $i <= $page['level']; $i++) { $title_prefix .= ' - '; }
			$template->set_var(array(
					'ID' => $page['page_id'],
					'TITLE' => ($title_prefix.$page['menu_title']),
					'MENU-TITLE' => ($title_prefix.$page['menu_title']),
					'PAGE-TITLE' => ($title_prefix.$page['page_title']),
					'FLAG_ICON' => ' none ',
				)
			);

			if($results_array['parent'] == $page['page_id'])
            {
				$template->set_var('SELECTED', ' selected="selected"');
			} elseif($results_array['page_id'] == $page['page_id'])
            {
				$template->set_var('SELECTED', ' disabled="disabled" class="disabled"');
				$list_next_level=false;
			} elseif($can_modify != true)
            {
				$template->set_var('SELECTED', ' disabled="disabled" class="disabled"');
			} else {
				$template->set_var('SELECTED', '');
			}
			$template->parse('page_list2', 'page_list_block2', true);
		}
		if ($list_next_level)
        {
          parent_list($page['page_id']);
        }

	}
}

$template->set_block('main_block', 'page_list_block2', 'page_list2');
if($admin->get_permission('pages_add_l0') == true OR $results_array['level'] == 0) {
	if($results_array['parent'] == 0)
    {
		$selected = ' selected="selected"';
	} else { 
		$selected = '';
	}
	$template->set_var(array(
		'ID' => '0',
		'TITLE' => $TEXT['NONE'],
		'SELECTED' => $selected
		)
	);
	$template->parse('page_list2', 'page_list_block2', true);
}
parent_list(0);

if($modified_ts == 'Unknown')
{
	$template->set_var('DISPLAY_MODIFIED', 'hide');
} else {
	$template->set_var('DISPLAY_MODIFIED', '');
}

// Templates list
$template->set_block('main_block', 'template_list_block', 'template_list');

$all_templates = array();
$database->execute_query(
	'SELECT `directory`,`name`,`function` FROM `'.TABLE_PREFIX.'addons` WHERE `type` = "template" AND (`function` = "template" OR `function`="") order by `name`',
	true,
	$all_templates
);

foreach( $all_templates as &$addon)
{
	// Check if the user has perms to use this template
	if($addon['directory'] == $results_array['template'] OR $admin->get_permission($addon['directory'], 'template') == true)
	{
		$template->set_var('VALUE', $addon['directory']);

		$template->set_var('NAME', $addon['name'].($addon['function']=="" ? " !" : ""));
		
		$depricated = ($addon['function']=="" ? " style='color:#FF0000;'" : ""); 

		if($addon['directory'] == $results_array['template'])
		{
			$template->set_var('SELECTED', ' selected="selected"'.$depricated);
		} else {
			$template->set_var('SELECTED', $depricated);
		}
		$template->parse('template_list', 'template_list_block', true);
	}
}

// Menu list
if(MULTIPLE_MENUS == false)
{
	$template->set_var('DISPLAY_MENU_LIST', 'display:none;');
}
// Include template info file (if it exists)
if($results_array['template'] != '')
{
	$template_location = LEPTON_PATH.'/templates/'.$results_array['template'].'/info.php';
} else {
	$template_location = LEPTON_PATH.'/templates/'.DEFAULT_TEMPLATE.'/info.php';
}
if(file_exists($template_location))
{
	require($template_location);
}
// Check if $menu is set
if(!isset($menu[1]) OR $menu[1] == '')
{
	// Make our own menu list
	$menu[1] = $TEXT['MAIN'];
}
// Add menu options to the list
$template->set_block('main_block', 'menu_list_block', 'menu_list');
foreach($menu AS $number => $name)
{
	$template->set_var('NAME', $name);
	$template->set_var('VALUE', $number);
	
	$template->set_var('SELECTED', ( ( $results_array['menu'] == $number) ? ' selected="selected"' : "" ) );
	
	$template->parse('menu_list', 'menu_list_block', true);
}

// Insert language values
$template->set_block('main_block', 'language_list_block', 'language_list');

// show fields only if language is enabled in settings
if (false == PAGE_LANGUAGES) $template->set_var('DISPLAY_LANGUAGE_LIST', 'display:none;');
if (false == PAGE_LANGUAGES) $template->set_var('DISPLAY_PAGE_CODE', 'display:none;');

$all_languages = array();
$database->execute_query(
	'SELECT `directory`,`name` FROM `'.TABLE_PREFIX.'addons` WHERE `type` = "language" ORDER BY `name`',
	true,
	$all_languages
);

foreach($all_languages as &$addon) {
	// Insert code and name
	$template->set_var(array(
		'VALUE' => strtoupper($addon['directory']),
		'NAME' => $addon['name'],
		'FLAG_LANG_ICONS' => 'url('.THEME_URL.'/images/flags/'.strtolower($addon['directory']).'.png)',
		'SELECTED' => ($results_array['language'] == strtoupper($addon['directory']))
				? ' selected="selected"'
				: ''
		)
	);

	$template->parse('language_list', 'language_list_block', true);
}

// Select disabled if searching is disabled
if($results_array['searching'] == 0)
{
	$template->set_var('SEARCHING_DISABLED', ' selected="selected"');
}
// Select what the page target is
switch ($results_array['target'])
{
	case '_top':
		$template->set_var('TOP_SELECTED', ' selected="selected"');
		break;
	case '_self':
		$template->set_var('SELF_SELECTED', ' selected="selected"');
		break;
	case '_blank':
		$template->set_var('BLANK_SELECTED', ' selected="selected"');
		break;
	default:
		$template->set_var('TOP_SELECTED', '');
		$template->set_var('SELF_SELECTED', '');
		$template->set_var('BLANK_SELECTED', '');
}

// Insert language text
$template->set_var(array(
		'HEADING_MODIFY_PAGE_SETTINGS' => $HEADING['MODIFY_PAGE_SETTINGS'],
		'TEXT_CURRENT_PAGE' => $TEXT['CURRENT_PAGE'],
		'TEXT_MODIFY' => $TEXT['MODIFY'],
		'TEXT_MODIFY_PAGE' => $HEADING['MODIFY_PAGE'],
		'LAST_MODIFIED' => $MESSAGE['PAGES_LAST_MODIFIED'],
		'TEXT_PAGE_TITLE' => $TEXT['PAGE_TITLE'],
		'TEXT_MENU_TITLE' => $TEXT['MENU_TITLE'],
		'TEXT_TYPE' => $TEXT['TYPE'],
		'TEXT_MENU' => $TEXT['MENU'],
		'TEXT_PARENT' => $TEXT['PARENT'],
		'TEXT_VISIBILITY' => $TEXT['VISIBILITY'],
		'TEXT_PUBLIC' => $TEXT['PUBLIC'],
		'TEXT_PRIVATE' => $TEXT['PRIVATE'],
		'TEXT_REGISTERED' => $TEXT['REGISTERED'],
		'TEXT_NONE' => $TEXT['NONE'],
		'TEXT_HIDDEN' => $TEXT['HIDDEN'],
		'TEXT_TEMPLATE' => $TEXT['TEMPLATE'],
		'TEXT_TARGET' => $TEXT['TARGET'],
		'TEXT_SYSTEM_DEFAULT' => $TEXT['SYSTEM_DEFAULT'],
		'TEXT_PLEASE_SELECT' => $TEXT['PLEASE_SELECT'],
		'TEXT_NEW_WINDOW' => $TEXT['NEW_WINDOW'],
		'TEXT_SAME_WINDOW' => $TEXT['SAME_WINDOW'],
		'TEXT_TOP_FRAME' => $TEXT['TOP_FRAME'],
		'TEXT_ADMINISTRATORS' => $TEXT['ADMINISTRATORS'],
		'TEXT_ALLOWED_VIEWERS' => $TEXT['ALLOWED_VIEWERS'],
		'TEXT_DESCRIPTION' => $TEXT['DESCRIPTION'],
		'TEXT_KEYWORDS' => $TEXT['KEYWORDS'],
		'TEXT_SEARCHING' => $TEXT['SEARCHING'],
		'TEXT_LANGUAGE' => $TEXT['LANGUAGE'],
		'TEXT_ENABLED' => $TEXT['ENABLED'],
		'TEXT_DISABLED' => $TEXT['DISABLED'],
		'TEXT_SAVE' => $TEXT['SAVE'],
		'TEXT_RESET' => $TEXT['RESET'],
		'LAST_MODIFIED' => $MESSAGE['PAGES_LAST_MODIFIED'],
		'HEADING_MODIFY_PAGE' => $HEADING['MODIFY_PAGE'],
		'TEXT_PAGE_CODE' => $TEXT['PAGE']." ".$TEXT['CODE'],
		'LEPTOKEN'	=> (isset($_GET['leptoken']) ? $_GET['leptoken'] : "")
	)
);

$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();

?>