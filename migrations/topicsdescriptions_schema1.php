<?php
/**
*
* Topics Descriptions extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 Vinny <https://github.com/vinny>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace vinny\topicsdescriptions\migrations;

class topicsdescriptions_schema1 extends \phpbb\db\migration\migration
{

	public function update_data()
	{
		return array(
			// Add permissions
			array('permission.add', array('f_topic_desc', false)),
			// Set permissions
			array('permission.permission_set', array('ROLE_FORUM_FULL', 'f_topic_desc')),
		);
	}
}