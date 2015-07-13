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

class topicsdescriptions_schema2 extends \phpbb\db\migration\migration
{
	/**
	 * Add table columns schema to the database:
	 *    topics:
	 *        topic_desc
	 *
	 * @return array Array of table columns schema
	 * @access public
	 */
	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'topics'	=> array(
					'topic_desc'	=> array('VCHAR_UNI', ''),
				),
			),
		);
	}

	/**
	 * Drop table columns schema from the database
	 *
	 * @return array Array of table columns schema
	 * @access public
	 */
	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'topics'	=> array(
					'topic_desc',
				),
			),
		);
	}
}
