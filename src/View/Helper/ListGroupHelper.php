<?php
/**
 * Cakestrap
 * Twitter Bootstrap Plugin for CakePHP 3+
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
namespace Cakestrap\View\Helper;

/**
 * List groups are a flexible and powerful component
 * for displaying not only simple lists of elements,
 * but complex ones with custom content.
 *
 * <code>
 * <?php
 * echo $this->Cakestrap->ListGroup()
 *                      ->item("One")
 *                      ->item("Two")
 *                      ->item("Three")
 *                      ->set()
 * ?>
 * </code>
 *
 * @package Cakestrap\View\Helper
 * @link http://getbootstrap.com/components/#list-group
 */
class ListGroupHelper extends Basic
{

    /**
     * Default helper options.
     * These options are merged with the user-provided options.
     *
     * @var array
     */
    protected  $_options  = [ 'class' => null ];

    /**
     * An array to hold the list group item
     *
     * @var array
     */
    protected $_item = [];

    /**
     * Set the  item
     *
     * @param string $item
     * @return $this
     */
    public function item($item = null)
    {
        $this->_item[] = $this->_stringTemplate->format('item', ['item' => $item]);;
        return $this;
    }

    /**
     * Set all the defined values.
     * This will return the final html template.
     *
     * @return string
     */
    public function set()
    {
        $this->_setItem();
        $this->_addToContainer();
        $this->_reset();

        return $this->_container;
    }

    /**
     * Extract all the items
     *
     * @return void
     */
    protected function _setItem()
    {
        $item  = implode("", $this->_item);
        $this->_item = $item;
    }

    /**
     * Add all items to parent container
     *
     * @return void
     */
    protected function _addToContainer()
    {
        $this->_container = $this->_stringTemplate->format('container', [
            'container' => $this->_item,
            'class' => $this->_options['class']]);
    }
}