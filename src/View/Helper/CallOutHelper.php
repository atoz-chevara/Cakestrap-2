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
 * Flexible and nicer details or info message boxes
 * to draw attention to important information.
 *
 * <code>
 * <?php
 * echo $this->Bootstrap->CallOut()
 *                      ->options(['type' => 'bs-callout-info'])
 *                      ->title("Note")
 *                      ->content("This callout  needs your attention, but it's not super important.")
 *                      ->set()
 * ?>
 * </code>
 *
 * @method options(array $options)
 * @method title(string $title)
 * @method content(string $content)
 *
 * @package Bootstrap\View\Helper
 */

class CallOutHelper extends Basic
{
    /**
     * Default helper options.
     * These options are merged with the user-provided options.
     *
     * @var array
     */
    public $_options = [
        'type' => 'bs-callout-info'
    ];

    /**
     * Set all  defined values.
     * This will return the final html template.
     *
     * @return string $container
     */
    public function set()
    {
        $this->_setTitle();
        $this->_setContent();

        $this->_addToContainer();
        $this->_reset();

        return $this->_container;
    }

    /**
     * Add callout items to parent container
     *
     * @return void
     */
    protected function _addToContainer()
    {
        $contents = $this->_contents();
        $this->_container = $this->_stringTemplate->format('container', [
            'container' => $contents,
            'type' => $this->_options['type']
        ]);
    }

    /**
     * Set the template for callout title
     *
     * @return void
     */
    protected function _setTitle()
    {
        $this->_contents[] = $this->_stringTemplate->format('title', ['title'=>$this->title]);
    }

    /**
     * Set the template for callout contents
     *
     * @return void
     */
    protected function _setContent()
    {
        $this->_contents[] = $this->_stringTemplate->format('content',   ['content'=>$this->content]);
    }

    /**
     * Extract and merge the callout contents
     *
     * @return void
     */
    protected function _contents()
    {
        $contents  = implode("", $this->_contents);

        return $contents;
    }
}