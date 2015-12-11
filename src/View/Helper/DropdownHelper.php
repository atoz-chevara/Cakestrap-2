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

/**
 * Add dropdown menus to nearly anything with this simple plugin,
 * including the navbar, tabs, and pills.
 *
 * <code>
 * <?php
 * echo $this->Bootstrap->Dropdown()
 *                      ->title("Select")
 *                      ->item(['Option 1'=>['controller'=>'home', 'action'=>'action1'])
 *                      ->item('Option 2')
 *                      ->item(['Option 3'=>['controller'=>'home', 'action'=>'action3']])
 *                      ->set()
 * ?>
 * </code>
 *
 * @method title(string $title)
 *
 * @package Bootstrap\View\Helper
 * @link http://getbootstrap.com/javascript/#dropdowns
 */

class DropdownHelper extends Basic
{
    /**
     * Helpers to use
     *
     * @param array
     */
    public $helpers = ['Html'];

    /**
     * An array that contain items
     *
     * @param array
     */
    protected $_items = [];

    /**
     * Set all the defined values.
     * This will return the final html template.
     *
     * @return string
     */
    public function set()
    {
        $options    = $this->_setItems();
        $ul         = $this->_stringTemplate->format('ul', ['ul'=>implode("", $options)]);
        $title      = $this->_setTitle();
        $container  = $this->_stringTemplate->format('container', ['container' => $title . $ul]);

        return $container;
    }

    /**
     * Set the Dropdown item
     *
     * @param string  $item
     * @return object $this
     */
    public function item($item = null)
    {
        $this->_items[] = $item;
        return $this;
    }

    /**
     * Set the Dropdown  title
     *
     * @return void
     */
    private function _setTitle()
    {
         return $this->_stringTemplate->format('title', ['title' => $this->title]);
    }

    /**
     * Collate the Dropdown helper items
     *
     * @return array $items
     */
    private function _setItems()
    {
        $items = [];
        foreach($this->_items as $name=>$value) {

            if(!is_array($value)) {
                $name  = $value;
                $value = "#";
            } else {
                $name  = key($value);
                $value = $value[$name];
            }
            $items[] = $this->_stringTemplate->format('li', [
                'li' => $this->Html->link($name, $value)
            ]);
        }

        return $items;
    }
}