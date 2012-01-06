<?php
namespace app\system;
use wcf\system\menu\page\PageMenu;
use wcf\system\application\AbstractApplication;
use wcf\system\breadcrumb\Breadcrumb;
use wcf\system\package\PackageDependencyHandler;
use wcf\system\request\LinkHandler;
use wcf\system\WCF;

/**
 * Application core
 *
 * @author 	Tim Düsterhus
 * @copyright	2011 Tim Düsterhus
 * @license GNU Lesser General Public License <http://www.gnu.org/licenses/lgpl-3.0.txt>
 * @package	de.wbbaddons.dummy.app
 */

class APPCore extends AbstractApplication {
	protected $packageID = 0;
	
	public function __construct() {
		$this->packageID = PackageDependencyHandler::getPackageID('de.wbbaddons.dummy.app');
		
		$this->initTPL();
		PageMenu::getInstance()->setActiveMenuItem('app.header.menu.index');
		WCF::getBreadcrumbs()->add(new Breadcrumb(WCF::getLanguage()->get('app.header.menu.index'), LinkHandler::getInstance()->getLink('Index', array('application' => 'app'))));
	}
	
	protected function initTPL() {
		self::getTPL()->addTemplatePath($this->packageID, APP_DIR.'templates/');
		self::getTPL()->assign('__app', $this);
	}
}
