<?php 
@session_start();

/**
 * Class file
 * ThemerDesigner
 */
class ThemeDesignerController
{
	protected $strSession = 'PCT_THEMEDESIGNER';
	
	/**
	 * Catch ajax requests
	 */
	public function ajaxListener()
	{
		if(!isset($_POST['themedesigner']) && !isset($_GET['themedesigner']))
		{
			return;
		}
		
		$strAction = '';
		$varValue = null;
		$strField = '';
		$strTheme = '';
		
		// POST listener
		if(isset($_POST['themedesigner']))
		{
			$strAction = $_POST['action'] ?? '';
			$varValue = $_POST['value'] ?? '';
			$strField = $_POST['field'] ?? '';
			$strTheme = $_POST['theme'] ?? '';
		}
		
		// GET listener
		else if(isset($_GET['themedesigner']))
		{
			$strAction = $_GET['action'] ?? '';
			$varValue = $_GET['value'] ?? '';
			$strField = $_GET['field'] ?? '';
			$strTheme = $_GET['theme'] ?? '';
		}
		
		// append the theme name
		$this->strSession .= (strlen($strTheme) > 0 ? '_'.$strTheme : '');
		
		// store value in the session
		if(strlen($strField) > 0)
		{
			$_SESSION[$this->strSession]['VALUES'][$strField] = $varValue;
		}
		
		// individual actions
		switch($strAction)
		{
			//-- THEMEDESIGNER
			
			// Mobile view
			case 'toggleMobile':
				$_SESSION[$this->strSession]['MOBILE'] = (int)$_GET['state'];
				break;
			// Devices
			case 'toggleDevice':
				$_SESSION[$this->strSession]['DEVICE'] = (string)$_GET['value'];
				break;
			// Zoom
			case 'toggleZoom':
				$_SESSION[$this->strSession]['ZOOM'] = (int)$_GET['value'];
				break;
			// Visibilty
			case 'toggleVisibility':
				$_SESSION[$this->strSession]['MINIFIED'] = (int)$_GET['state'];
				break;
			// iFrame url update
			case 'updateIframeUrl':
				$_SESSION[$this->strSession]['IFRAME_URL'] = $_GET['url'];
				break;
				
			//-- SECTIONS
			
			// toggle palette
			case 'togglePalette':
				$strIdent = $_GET['section'].'__'.$_GET['palette'];
				$_SESSION[$this->strSession]['TOGGLER'][$strIdent] = $_GET['active'];
				break;
			// toggle switch
			case 'toggleSwitch':
				$strIdent = $_GET['name'];
				$_SESSION[$this->strSession]['SWITCH'][$strIdent] = $_GET['active'];
				break;
			// toggle switches
			case 'toggleSwitches':
				$arrSwitches = $_GET['switches'];
				
				if(is_string($arrSwitches))
				{
					$arrSwitches = json_decode($arrSwitches);
				}
				
				if(empty($arrSwitches))
				{
					break;
				}
				
				if(!is_array($_SESSION[$this->strSession]['SWITCH']))
				{
					$_SESSION[$this->strSession]['SWITCH'] = array();
				}
				
				$_SESSION[$this->strSession]['SWITCH'] = array_merge($_SESSION[$this->strSession]['SWITCH'],$arrSwitches);
				break;
				
			//-- NAVIGATION
			
			// store active section name	
			case 'showSection':
				$_SESSION[$this->strSession]['NAVI']['active'] = $_GET['section'];
				break;
			// toggle active section
			case 'toggleSection':
				if($_SESSION[$this->strSession]['NAVI']['active'] != $_GET['section'])
				{
					$_SESSION[$this->strSession]['NAVI']['active'] = $_GET['section'];
				}
				else
				{
					unset($_SESSION[$this->strSession]['NAVI']['active']);
				}
				break;
		}
	}
}

$objController = new ThemeDesignerController();
$objController->ajaxListener();