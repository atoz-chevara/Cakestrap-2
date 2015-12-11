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
 * Use the well as a simple effect on an element to give it an inset effect.
 *
 * <code>
 * <?php
 * echo $this->Bootstrap->Well()->content("Look, I'm in a large well!")->set()
 * ?>
 * </code>
 *
 * @method content(string $content)
 *
 * @package Bootstrap\View\Helper
 * @link http://getbootstrap.com/components/#wells
 */
class WellHelper extends Basic
{
    /**
     * Set all  defined values.
     * This will return the final html template.
     *
     * @return string
     */
    public function set()
    {
        $container  = $this->_stringTemplate->format('container', ['container' => $this->content]);
        return $container;
    }
}