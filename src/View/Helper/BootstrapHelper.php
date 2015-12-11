<?php
/**
 * Copyright (c) CMNWorks
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) CMNWorks Christopher M. Natan
 * @author        Christopher M. Natan
 * @link          http://cmnworks.com
 * @since         1.8.8
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Bootstrap\View\Helper;

use Cake\View\Helper;

/**
 * Bootstrap base class helper.
 *
 * Bootstrap class let you encapsulate related helper into a reusable
 * and testable class.
 *
 * @package Bootstrap\View\Helper
 *
 * @see AlertHelper()
 * @see BadgeHelper()
 * @see ButtonItemsHelper()
 * @see CallOutHelper()
 * @see CollapseHelper()
 * @see DropdownHelper()
 * @see ListGroupHelper()
 * @see ModalHelper()
 * @see PanelHelper()
 * @see TablesHelper()
 * @see TabHelper()
 * @see WellHelper()
 */
class BootstrapHelper extends Helper
{
    /**
     * PHP reserves all function names starting with __ as magical.
     *
     * @param string $method
     * @param array $args
     * @return object $this
     */
    public function __call($method, $args = [])
    {
        $params = array_flip($args);
        if(isset($params['reset'])) {
            $this->_View->helpers()->unload('Bootstrap.' . $method);
        }

        if(!in_array($method, $this->_View->helpers()->loaded())) {
            $this->_View->helpers()->load('Bootstrap.' . $method);
            $this->_View->{$method}->assignTemplate($method);
        }

        return $this->_View->{$method};
    }
}