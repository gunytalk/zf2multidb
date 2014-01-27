<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	private $adapter1;
	private $adapter2;
	
	public function getAdapterOld()
	{
		if (!$this->adapter1) {
			$sm = $this->getServiceLocator();
		   // var_dump($sm);die;
			$this->adapter1 = $sm->get('adapter1');
			print_r($this->adapter1);die;
			
		}
		return $this->adapter1;
	}
	public function getNewAdapter()
	{
		if (!$this->adapter2) {
			$sm = $this->getServiceLocator();
			$this->adapter2 = $sm->get('adapter2');
				
		}
		return $this->adapter2;
		
	}
    public function indexAction()
    {
    	$this->getAdapterOld()->getNewContent();
        return new ViewModel();
    }
}
