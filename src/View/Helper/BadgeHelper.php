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
 * Easily highlight new or unread items by adding a
 * Badge helper  to links, Bootstrap navs, and more.
 *
 * <code>
 * <?php
 * echo $this->Cakestrap->Badge()->content("New")->set()
 * ?>
 * </code>
 *
 * @method content(string $content)
 *
 * @package Cakestrap\View\Helper
 * @link http://getbootstrap.com/components/#badges
 */
class BadgeHelper extends Basic
{
    /**
     * Set all defined values.
     * This will return the final html template.
     *
     * @return string
     */
    public function set()
    {
        $container  = $this->_stringTemplate->format('container', [
            'container' => $this->content
        ]);

        return $container;
    }
}