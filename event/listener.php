<?php
/**
*
* Topics Descriptions extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 Vinny <https://github.com/vinny>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace vinny\topicsdescriptions\event;

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Constructor
	*
	* @param \phpbb\db\driver\driver_interface    $db               DBAL object
	* @param \phpbb\auth\auth                     $auth             Auth object
	* @param \phpbb\request\request_interface     $request          Request object
	* @param \phpbb\template\template             $template         Template object
	* @param \phpbb\user                          $user             User object
	* @return \vinny\topicsdescriptions\event\listener
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\auth\auth $auth, \phpbb\request\request_interface $request, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->db = $db;
		$this->auth = $auth;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'							=> 'load_language_on_setup',
			'core.permissions'							=> 'add_forum_permission',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'vinny/topicsdescriptions',
			'lang_set' => 'topicsdescriptions',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function add_forum_permission($event)
	{
		$permissions = array_merge($event['permissions'], array(
				'f_topic_desc'		=> array('lang' => 'ACL_F_TOPIC_DESC', 'cat' => 'post'),
			));
		$event['permissions'] = $permissions;
	}
}
