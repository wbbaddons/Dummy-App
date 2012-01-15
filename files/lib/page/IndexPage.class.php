<?php
namespace app\page;
use wcf\page\AbstractPage;
use wcf\system\WCF;

/**
 * Shows the index page
 *
 * @author 	Tim Düsterhus
 * @copyright	2011 Tim Düsterhus
 * @license GNU Lesser General Public License <http://www.gnu.org/licenses/lgpl-3.0.txt>
 * @package	de.wbbaddons.dummy.app
 */

class IndexPage extends AbstractPage {
	public function readData() {
		parent::readData();

		$sql = "SELECT count(*) as count
			FROM wcf".WCF_N."_user";
		$stmt = WCF::getDB()->prepareStatement($sql);
		$stmt->execute();
		$this->userCount = $stmt->fetchArray();

		$sql = "SELECT userID, username 
			FROM wcf".WCF_N."_user
			ORDER BY userID DESC
			LIMIT 1";
		$stmt = WCF::getDB()->prepareStatement($sql);
		$stmt->execute();
		$this->newestUser = $stmt->fetchArray();

		$sql = "SELECT session.userID, user.userID, user.username
			FROM wcf".WCF_N."_session as session
			LEFT JOIN wcf".WCF_N."_user as user
			ON session.userID = user.userID
			WHERE session.userID IS NOT NULL
			GROUP BY user.userID, session.userID, user.username
			ORDER BY session.userID";
		$stmt = WCF::getDB()->prepareStatement($sql);
		$stmt->execute();
		while ($row = $stmt->fetchArray()) $usersOnline[] = $row;	

		$this->usersOnline = (isset($usersOnline)) ? $usersOnline : NULL;
	}

	public function assignVariables() {
		parent::assignVariables();

		WCF::getTPL()->assign(array(
			'userCount' => $this->userCount['count'],
			'newestUser' => $this->newestUser,
			'usersOnline' => $this->usersOnline
		));
	}
}
