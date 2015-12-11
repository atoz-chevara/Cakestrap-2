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
 * While not always necessary, sometimes you need to put your
 * DOM in a box. For those situations, try the panel component.
 *
 * <code>
 * <?php
 * echo $this->Bootstrap->Panel()->header(string $header)
 *                               ->body(stringOrArray $body)
 *                               ->footer(string $footer)
 *                               ->set();
 * ?>
 * </code>
 *
 * @method header(string $header)
 * @method body(arrayOrstring $body)
 * @method footer(string $footer)
 *
 * @package Bootstrap\View\Helper
 * @link http://getbootstrap.com/javascript/#modals
 */

class PanelHelper extends Basic
{
    /**
     * Additional options for this helper
     *
     * @var array
     */
    protected $_options   = [
        'type' => 'panel-default'
    ];

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
        return $this->_container;
    }

    /**
     * Add the  panel html template to parent container.
     *
     * @return void
     */
    protected function _addToContainer()
    {
        $contents = $this->_contents();
        $this->_container = $this->_stringTemplate->format('container', [
            'container' => $contents, 'type' => $this->_options['type']
        ]);
    }

    /**
     * Set the panel header
     *
     * @return void
     */
    protected function _setHeader()
    {
        $this->_contents[] = $this->_stringTemplate->format('header', ['header'=>$this->header]);
    }

    /**
     * Set the panel body
     *
     * @return void
     */
    protected function _setBody()
    {
        $this->_contents[] = $this->_stringTemplate->format('body',   ['body'=>$this->body]);
    }

    /**
     * Set the panel footer
     *
     * @return void
     */
    protected function _setFooter()
    {
        $this->_contents[] = $this->_stringTemplate->format('footer', ['footer'=>$this->footer]);
    }

    /**
     * Set the panel contents
     *
     * @return void
     */
    protected function _contents()
    {
        $contents  = implode("", $this->_contents);
        return $contents;
    }
}