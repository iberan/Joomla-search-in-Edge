<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Search Component Controller
 *
 * @since  1.5
 */
class SearchController extends JControllerLegacy
{
	/**
	 * Method to display a view.
	 *
	 * @param   bool  $cachable   If true, the view output will be cached
	 * @param   bool  $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JControllerLegacy This object to support chaining.
	 *
	 * @since   1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		// Force it to be the search view
		$this->input->set('view', 'search');

		return parent::display($cachable, $urlparams);
	}
	/**
	 * by BI - accented chars problem in MS Edge
	 */
	public function removeAccents($str, $a = false, $b = false)
	{
		$user_agent = $_SERVER['HTTP_USER_AGENT'];

		if(preg_match('/Edge/i', $user_agent)) {

		$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');

		$b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');

		return str_replace($a, $b, $str);

		} else {

		return $str;

		}
	}
	/**
	 * Search
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function search()
	{
		// Slashes cause errors, <> get stripped anyway later on. # causes problems.

		$badchars = array('#', '>', '<', '\\');
		$searchword = trim(str_replace($badchars, '', $this->input->getString('searchword', null, 'post')));

		// by BI - accented chars problem in Edge
		$searchword = $this->removeAccents($searchword);

		// If searchword enclosed in double quotes, strip quotes and do exact match
		if (substr($searchword, 0, 1) == '"' && substr($searchword, -1) == '"')
		{
			$post['searchword'] = substr($searchword, 1, -1);
			$this->input->set('searchphrase', 'exact');
		}
		else
		{
			$post['searchword'] = $searchword;
		}

		$post['ordering']     = $this->input->getWord('ordering', null, 'post');
		$post['searchphrase'] = $this->input->getWord('searchphrase', 'all', 'post');
		$post['limit']        = $this->input->getUInt('limit', null, 'post');

		if ($post['limit'] === null)
		{
			unset($post['limit']);
		}

		$areas = $this->input->post->get('areas', null, 'array');

		if ($areas)
		{
			foreach ($areas as $area)
			{
				$post['areas'][] = JFilterInput::getInstance()->clean($area, 'cmd');
			}
		}

		// The Itemid from the request, we will use this if it's a search page or if there is no search page available
		$post['Itemid'] = $this->input->getInt('Itemid');

		// Set Itemid id for links from menu
		$app  = JFactory::getApplication();
		$menu = $app->getMenu();
		$item = $menu->getItem($post['Itemid']);

		// The requested Item is not a search page so we need to find one
		if ($item->component != 'com_search' || $item->query['view'] != 'search')
		{
			// Get item based on component, not link. link is not reliable.
			$item = $menu->getItems('component', 'com_search', true);

			// If we found a search page, use that.
			if (!empty($item))
			{
				$post['Itemid'] = $item->id;
			}
		}

		unset($post['task']);
		unset($post['submit']);

		$uri = JUri::getInstance();
		$uri->setQuery($post);
		$uri->setVar('option', 'com_search');

		$this->setRedirect(JRoute::_('index.php' . $uri->toString(array('query', 'fragment')), false));
	}
}
