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
 * This helper provides methods for generating asset paths.
 * Codes are applicable to layout only.
 *
 * <code>
 * <?php
 * //auto render bootstrap styles
 *  echo $this->Bootstrap->Asset()->style();
 *
 * //auto render bootstrap scripts
 *  echo $this->Bootstrap->Asset()->script();
 * ?>
 * </code>
 *
 * @package Bootstrap\View\Helper
 */

class AssetHelper extends Basic
{
    /**
     * Asset helpers
     *
     * @var array
     */
    public $helpers       = ['Html'];

    /**
     * Url to jquery library without a scheme in order to support http or https.
     *
     * @var string
     */
    protected $_jquery      = '//code.jquery.com/jquery-1.11.3.min.js';

    /**
     * Automatically set JS script to an specific Bootstrap helpers.
     *
     * @var array
     */
    protected $_autoScript  = [
        'Alert'    => ['alert'],
        'Dropdown' => ['dropdown'],
        'Modal'    => ['modal'],
        'Tab'      => ['tab'],
        'Collapse' =>  ['collapse', 'transition'],
        'NiceCollapse' =>  ['collapse', 'transition', 'nice-collapse'],
        'NiceModal' =>  ['modal', 'nice-modal'],
    ];

    /**
     * An array to handle scripts
     *
     * @var array
     */
    protected $_script      = [];

    /**
     * An array to handle styles
     *
     * @var array
     */
    protected $_style       = [];

    /**
     * Build CSS style data from an array of  CSS properties.
     *
     * @param array $style
     * @return string $css Styling data.
     */
    public function style($style = [])
    {
        if(!empty($style)) {
            foreach($style as $key=>$value) {
                $css[] = $this->Html->css($value);
            }

            $this->_style =  $css;
        } else {
            $css[]  = $this->Html->css('Bootstrap.bootstrap');
            $css[]  = $this->Html->css('Bootstrap.extend');
            $css[]  = $this->Html->css('Bootstrap.font-awesome');
        }

        return implode("", $css) . implode("", $this->_style);
    }

    /**
     * Build script data from an array of JS properties.
     *
     * @param array $script
     * @return string $script Script data.
     */
    public function script($script = [])
    {
        if(!empty($script)) {
            foreach($script as $key=>$value) {
                $js[] = $this->Html->script($value);
            }

            $this->_script =  implode('', $js);
        }

        $js[]     = $this->Html->script($this->_jquery);
        $helpers  = $this->_View->helpers()->loaded();

        foreach($helpers as $key=>$value) {
            if(isset($this->_autoScript[$value])) {
                foreach($this->_autoScript[$value] as $name) {
                    $js[] = $this->Html->script('Bootstrap.' . strtolower($name));
                }
            }
        }

        $hasNoScript = !$this->_View->get("Bootstrap.script");
        if(!$hasNoScript) {
            $plugin   = sprintf('%s.%s', $this->request->params["plugin"], strtolower($this->request->params['controller']));
            $js[]     = $this->Html->script($plugin);
        }

        $script = array_merge($js, $this->_script);
        return implode("", $script);
    }

    /**
     * Create id and class attributes based on controller and  action name.
     *
     * @param string $classOrId
     * @return string
     */
    public function ident($classOrId = null)
    {
        $params     = $this->request->params;
        $controller = strtolower($params['controller']);
        $id     =  sprintf("%s%s",  $controller, ucfirst(strtolower($params['action'])));
        $class  =  sprintf("%s-%s", $controller, strtolower($params['action']));

        if($classOrId) {
            $class = $classOrId['class'] . "-"  .  strtolower($classOrId['id']);
            $id    = $classOrId['class'] . ucwords($classOrId['id']);
        }

        return sprintf("class='%s' id='%s'", $class, $id);
    }
}