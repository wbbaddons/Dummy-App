<?php
// remove dependencies, as they are in the package.xml for the sole reason of installing them all
$package = $this->installation->getPackage();
$sql = "DELETE FROM	wcf".WCF_N."_package_requirement
	WHERE		packageID = ?
		AND	requirement <> ?";
$statement = wcf\system\WCF::getDB()->prepareStatement($sql);
$statement->execute(array($package->packageID, 1));
