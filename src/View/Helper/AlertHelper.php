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
 * Provide contextual feedback messages for typical user actions
 * with the handful of available and flexible alert messages.
 *
 * <code>
 * <?php
 * echo $this->Cakestrap->Alert()
 *                      ->options(['type' => 'alert-danger', 'dismissible' => true])
 *                      ->content("<strong>Heads up!</strong> This alert needs your attention.")
 *                      ->set()
 * ?>
 * </code>
 *
 * @method options(array $options)
 * @method content(string $content)
 *
 * @package Cakestrap\View\Helper
 * @link http://getbootstrap.com/components/#alerts
 */
class AlertHelper extends Basic
{

    /**
     * Constant dismissible
     *
     * @var string
     */
    const DISMISSIBLE = 'alert-dismissible';

    /**
     * Default helper options.
     * These options are merged with the user-provided options.
     *
     * @var array
     */
    public $_options  = [
        'type' => 'alert-info',
        'dismissible' => false
    ];

    /**
     * Set all defined values.
     * This will return the final html template.
     *
     * @return string
     */
    public function set()
    {
        $container  = $this->_stringTemplate->format('container', [
            'container' => $this->content,
            'type'  =>  $this->_options['type'],
            'dismissible' => $this->_isDismissible()['dismissible'],
            'button'      => $this->_isDismissible()['button']
        ]);
        return $container;
    }

    /**
     * Assign dismissible settings.
     *
     * @return string | null
     */
    protected function _isDismissible()
    {
        if($this->_options['dismissible']) {
            return [
                'button' => $this->_template['button'],
                'dismissible' => self::DISMISSIBLE
            ];
        }

        return ['button' => null, 'dismissible' => null];
    }
}