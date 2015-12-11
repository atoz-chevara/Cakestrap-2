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
namespace Cakestrap\View\Helper;

/**
 * List group items may be buttons instead of list items.
 *
 * <code>
 * <?php
 * echo $this->Cakestrap->ButtonItems()
 *                      ->button("One")
 *                      ->button("Two")
 *                      ->button("Three")
 *                      ->set()
 * ?>
 * </code>
 *
 * @method options(array $options)
 *
 * @package Cakestrap\View\Helper
 * @link http://getbootstrap.com/components/#list-group-buttons
 */
class ButtonItemsHelper extends Basic
{
    /**
     * Default helper options.
     * These options are merged with the user-provided options.
     *
     * @var array
     */
    protected  $_options  = [ 'class' => null ];

    /**
     * An array to hold the button items
     *
     * @var array
     */
    protected $_button = [];

    /**
     * Set the button items
     *
     * @param string $button
     * @return object $this
     */
    public function button($button = null)
    {
        $this->_button[] = $this->_stringTemplate->format('button', ['button'=>$button]);;
        return $this;
    }

    /**
     * Set all defined values.
     * This will return the final html template.
     *
     * @return string $container
     */
    public function set()
    {
        $this->_setButton();
        $this->_addToContainer();
        $this->_reset();

        return $this->_container;
    }

    /**
     * Extract all the button items
     *
     * @return void
     */
    protected function _setButton()
    {
        $button = implode("", $this->_button);
        $this->_button = $button;
    }

    /**
     * Add all button items to parent container
     *
     * @return void
     */
    protected function _addToContainer()
    {
        $this->_container = $this->_stringTemplate->format('container', [
            'container' => $this->_button,
            'class' => $this->_options['class']]);
    }
}