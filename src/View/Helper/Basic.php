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

use Cake\View\StringTemplate;
use Cake\View\Helper;

/**
 * Handles magic methods for Bootstrap helpers.
 *
 * @package Cakestrap\View\Helper
 */
abstract class Basic extends Helper
{
    /**
     * Contains a particular html template
     *
     * @var string
     */
    protected $_template;

    /**
     * A variable that contains the CakePHP StringTemplate object
     *
     * @var StringTemplate object
     */
    protected $_stringTemplate;

    /**
     * Default helper options.
     * These options are merged with the user-provided options.
     *
     * @var array
     */
    protected  $_options = [];

    /**
     * Variable that cloned the default param options.
     *
     * @var array
     */
    protected $_clone;

    /**
     * Collected contents from the magic methods
     *
     * @var array
     */
    protected $_contents;

    /**
     * PHP reserves all function names starting with __ as magical.
     *
     * @param string $method
     * @param array $args
     * @return object $this
     */
    public function __call($method, $args)
    {
        $this->{$method} = (isset($args[0]) ? $args[0] : $args);

        return $this;
    }

    /**
     * This method will merge the default helper options
     * and user-provided options.
     *
     * @param array $options
     * @return object $this
     */
    public function options($options = [])
    {
        $this->_clone   = $this->_options;
        $this->_options = array_merge($this->_options, $options);

        return $this;
    }

    /**
     * For helpers that supports body
     *
     * @param array | string $body
     * @return object $this
     */
    public function body($body)
    {
        if(is_array($body)) {
            $this->body = implode('', $body);
        } else {
            $this->body = $body;
        }

        return $this;
    }

    /**
     * Automatically assign bootstrap template to loaded helper.
     *
     * @param string $name Template name
     * @return void
     */
    public function assignTemplate($name = null)
    {
        $template   = new Templates();
        $exist      = method_exists($template, $name);

        if($exist) {
            $template               = (array)$template::$name();
            $this->_stringTemplate  = new StringTemplate();
            $this->_stringTemplate->add($template);
        }

        $this->_template = $template;
    }

    /**
     * Now we need to reset the values to support multiple
     * bootstrap  helper in a page.
     *
     * @return void
     */
    protected function _reset()
    {
        $this->_options   = $this->_clone;
        $this->_contents  = [];
        $this->_item      = [];
        $this->_button    = [];
        $this->_active    = null;
        $this->_in        = null;
        $this->radio      = null;
        $this->checked    = null;
    }
}