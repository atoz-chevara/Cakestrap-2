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
 * Modals are streamlined, but flexible, dialog prompts
 * with the minimum required functionality and smart defaults.
 *
 * <code>
 * <?php
 * echo $this->Cakestrap->Modal()->header('Alert')
 *                               ->options(['show' => true])
 *                               ->body("This modal  needs your attention, but it's not super important.")
 *                               ->footer('I am footer.')
 *                               ->set();
 * ?>
 * </code>
 *
 * @method header(string $header)
 * @method body(arrayOrstring $body)
 * @method footer(string $footer)
 *
 * @package Cakestrap\View\Helper
 * @link http://getbootstrap.com/javascript/#modals
 */
class ModalHelper extends Basic
{
    /**
     * Contains parent html tag
     *
     * @var string
     */
    protected $_container = [];

    /**
     * An array of valid content for this helper.
     *
     * @var array
     */
    protected $_contents = [];

    /**
     * Default modal options.
     * These options  are merged with the user-provided options.
     *
     * -width : You can use either modal-md, modal-lg, modal-sm
     *
     * -show : Show the modal on page load.
     *
     * -closable : Enable/disable the close(x) options
     *
     * @var array
     */
    protected  $_options  = [
        'show'   => false,
        'width'  => 'modal-md',
        'id'     => '',
        'closable'=> false,
        'class'   => ''
    ];

    /**
     * A variable that cloned the default $_options.
     *
     * @var array
     */
    protected $_clone;

    /**
     * This method will merge the default modal helper
     * options and user-provided options.
     *
     * @param array $options
     * @return object $this
     */
    public function options($options = [])
    {
        parent::options($options);

        $this->_options['visibility']   = 'fade out';
        $this->_options['id']           = 'id_' . mt_rand(1,12345);

        if((int)$this->_options['show'] == 1) {
            $this->_options['visibility'] = 'fade in';
        }

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
        $this->_setHeader();
        $this->_setBody();
        $this->_setFooter();

        $this->_addToContainer();
        $this->_reset();

        return $this->_container;
    }

    /**
     * Add the  modal html template to parent container.
     *
     * @return void
     */
    protected function _addToContainer()
    {
        $container = array_merge(['container' => $this->_contents()], $this->_options);
        $this->_container =  $this->_stringTemplate->format('container', $container);
    }

    /**
     * Set the modal header
     *
     * @return void
     */
    protected function _setHeader()
    {
        if(!$this->header) return null;

        $closable = '';
        if($this->_options['closable'] == true) {
            $closable   = $this->_template['closable'];
        }

        $this->_contents[] =  $this->_stringTemplate->format('header', [
            'header' => $this->header, 
            'closable' => $closable
        ]);
    }

    /**
     * Set the modal body
     *
     * @return void
     */
    protected function _setBody()
    {
        if(!$this->body) return null;
        $this->_contents[] =   $this->_stringTemplate->format('body', ['body'=>$this->body]);
    }

    /**
     * Set the modal footer
     *
     * @return void
     */
    protected function _setFooter()
    {
        if(!$this->footer) return null;
        $this->_contents[] = $this->_stringTemplate->format('footer', ['footer'=>$this->footer]);
    }

    /**
     * And finally set all the html contents
     *
     * @return string $content
     */
    protected function _contents()
    {
        $contents  = implode("", $this->_contents);
        return $contents;
    }
}