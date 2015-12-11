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
 * Flexible plugin that utilizes a handful of
 * classes for easy toggle behavior.
 *
 * <code>
 * <?php
 * echo $this->Cakestrap->Tab()
 *                      ->nav('Tab 1')
 *                      ->content("This Tab 1  needs your attention, but it's not super important.")
 *                      ->prepare($isActive = true)
 *
 *                      ->nav('Tab 2')
 *                      ->content("This Tab 2 needs your attention, but it's not super important.")
 *                      ->prepare()
 *
 *                      ->set()
 *
 * ?>
 * </code>
 *
 * @method content(string $content)
 * @method nav(string $nav)
 *
 * @package Cakestrap\View\Helper
 */

class TabHelper extends Basic
{
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
    protected $_target;

    /**
     * Set all defined values.
     * This will return the final html template.
     *
     * @return string
     */
    public function set()
    {
        if(empty($this->_prepare)) {
            $this->_setNav();
            $this->_setTab();
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
        $this->_setNav();
        $this->_setTab();

        $content = $this->_contents();
        $this->_prepare['nav'][]  = $content['nav'];
        $this->_prepare['tab'][]  = $content['tab'];

        $this->_reset();
        return $this;
    }

    /**
     * Now we need to reset the values to support multiple
     * tab helper in a page.
     *
     * @return void
     */
    protected function _reset()
    {
        $this->_contents = [];
        $this->_active   = null;
    }

    /**
     * Add collapse items to parent container
     *
     * @return void
     */
    protected function _addToContainer()
    {
        if(empty($this->_prepare)) {
            $contents = $this->_contentss();
            $prepare  = $this->_stringTemplate->format('prepare', ['prepare'=>$contents]);
        } else {
            $prepare[]  = $this->_prepare;
        }

        $nav = $this->_insertNavContent();
        $tab = $this->_insertTabContent();
        $this->_container = $this->_stringTemplate->format('container', ['container'=>$nav . $tab]);
    }

    /**
     * Set nav template
     *
     * @return void
     */
    protected function _setNav()
    {
        $this->_target    = str_replace(" ", '', strtolower($this->nav));
        $this->_contents['nav'] = $this->_stringTemplate->format('nav', [
            'nav'=>$this->nav,
            'target'=>$this->_target,
            'active'=>$this->_active
        ]);
    }

    /**
     * Set tab template
     *
     * @return void
     */
    protected function _setTab()
    {
        $this->_contents['tab'] = $this->_stringTemplate->format('tab', [
            'tab'=>$this->content,
            'target'=>$this->_target,
            'active'=>$this->_active
        ]);
    }

    /**
     * Insert nav content
     *
     * @return string $navContent
     */
    protected function _insertNavContent()
    {
        $navContent =  $this->_stringTemplate->format('navcontent', ['navcontent'=>implode("", $this->_prepare['nav'])]);
        return $navContent;
    }

    /**
     * Insert tab content
     *
     * @return string $tabContent
     */
    protected function _insertTabContent()
    {
        $tabContent =  $this->_stringTemplate->format('tabcontent', ['tabcontent'=>implode("", $this->_prepare['tab'])]);
        return $tabContent;
    }

    /**
     * Tab contents
     *
     * @return array $contents
     */
    protected function _contents()
    {
        return $this->_contents;
    }
}