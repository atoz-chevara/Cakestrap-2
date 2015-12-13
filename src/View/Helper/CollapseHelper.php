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
 * Flexible plugin that utilizes a handful of
 * classes for easy toggle behavior.
 *
 * <code>
 * <?php
 * echo $this->Cakestrap->Collapse()
 *                      ->title("Menu 1")
 *                      ->body("Menu 1 Content")
 *                      ->prepare()
 *
 *                      ->title("Menu 2")
 *                      ->body("Menu 2 Content")
 *                      ->prepare()
 *
 *                      ->set()
 * ?>
 * </code>
 *
 * @method title(string $title)
 * @method body(string $body)
 *
 * @package Cakestrap\View\Helper
 * @link http://getbootstrap.com/javascript/#collapse
 */
class CollapseHelper extends Basic
{
    /**
     * Additional options for this helper
     *
     * @var array
     */
    protected $_options    = [];

    /**
     * Mark the content as new set
     *
     * @var array
     */
    protected $_prepare    = [];

    /**
     * Contain active string value
     *
     * @var string
     */
    protected $_active     = null;
    protected $_in         = null;

    /**
     * Set all defined values.
     * This will return the final html template.
     *
     * @return string
     */
    public function set()
    {
        if(empty($this->_prepare)) {
            $this->_setTitle();
            $this->_setBody();
        }

        $this->_addToContainer();
        return $this->_container;
    }

    /**
     * Prepare the template content
     *
     * @param boolean $isActive Set item active or inactive
     * @return object $this
     */
    public function prepare($isActive = false)
    {
        $this->_active = ($isActive ? 'active' : null);
        $this->_in     = ($isActive ? 'in' : null);

        $this->_setTitle();
        $this->_setBody();

        $this->_prepare[]  = $this->_stringTemplate->format('prepare', ['prepare' => $this->_contents()]);
        $this->_reset();

        return $this;
    }

    /**
     * Add collapse items to parent container
     *
     * @return void
     */
    protected function _addToContainer()
    {
        if(empty($this->_prepare)) {
            $contents = $this->_contents();
            $prepare  = $this->_stringTemplate->format('prepare', ['prepare' => $contents]);
        } else {
            $prepare  = implode("", $this->_prepare);
        }

        $this->_container = $this->_stringTemplate->format('container', ['container'=>$prepare]);
    }

    /**
     * Create string id based on collapse title
     *
     * @return string $id
     */
    protected function _createId()
    {
        return $id = strtolower(str_replace(" ", "_", trim($this->title)));
    }

    /**
     * Set the Bootstrap collapse title
     *
     * @return void
     */
    protected function _setTitle()
    {

        $this->_contents[] = $this->_stringTemplate->format('title', [
            'title'     =>  $this->title,
            'id'        =>  $this->_createId(),
            'href'      =>  $this->_href(),
            'active'    =>  $this->_active]);
    }

    /**
     * Set the Bootstrap collapse body
     *
     * @return void
     */
    protected function _setBody()
    {
        $this->_contents[] = $this->_stringTemplate->format('body', [
            'body'  =>  $this->body,
            'id'    =>  $this->_createId(),
            'href'  =>  $this->_href(),
            'in'    =>  $this->_in
        ]);
    }

    /**
     * Set the Bootstrap collapse contents
     *
     * @return array $contents
     */
    protected function _contents()
    {
        $contents  = implode("", $this->_contents);
        return $contents;
    }

    /**
     * Set the href attribute of an element
     *
     * @return array $href
     */
    protected function _href()
    {
        if(is_array($this->href)) {
            $link            = [
                'plugin'     => null,
                'controller' => null,
                'action'     => null,
            ];
            $merged     = array_merge($link, $this->href);
            $this->href = sprintf("/%s", implode("/", $merged));
        } else {
            $this->href =  sprintf("#collapse_%s", $this->_createId());
        }

        return $this->href;
    }
}