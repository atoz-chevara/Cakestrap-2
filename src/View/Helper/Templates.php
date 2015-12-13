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
 * Bootstrap basic template configuration.
 *
 * @package Cakestrap\View\Helper
 */
class Templates
{
    public static function alert()
    {
        $config = [
            'container'    => '<div role="alert" class="alert {{type}} {{dismissible}}">{{button}}{{container}}</div>',
            'button'       => '<button aria-label="Close" data-dismiss="alert" class="close" type="button">
                                    <span aria-hidden="true">&times;</span>
                               </button>'
        ];
        return $config;
    }

    public static function badge()
    {
        $config = [
            'container' => ' <span class="badge {{type}}">{{container}}</span>',
        ];
        return $config;
    }

    public static function buttonItems()
    {
        $config = [
            'container' => '<div class="list-group {{class}}">
                               {{container}}
                            </div>',
            'button'    => '<button type="button" class="list-group-item">{{button}}</button>',
        ];
        return $config;
    }

    public static function callOut()
    {
        $config = [
            'container' => '<div class="bs-callout {{type}}">{{container}}</div>',
            'title'     => '<h4>{{title}}</h4>',
            'content'   => '<p>{{content}}</p>',
        ];
        return $config;
    }

    public static function collapse()
    {
        $config = [
            'container' => '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                {{container}}
                           </div>',
            'prepare'   => '<div class="panel panel-default">{{prepare}}</div>',
            'title'     => '<div class="panel-heading {{active}}" role="tab">
                             <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="{{href}}" aria-expanded="false" aria-controls="collapse_{{id}}">
                                 <h4 class="panel-title">
                                    <i class="fa fa-{{icon}}"></i>
                                        {{title}}
                                    <i class="fa fa-chevron-{{chevron}} chevron"></i>
                                 </h4>
                             </a>
                            </div>',
            'body'      => '<div id="collapse_{{id}}" class="panel-collapse collapse {{in}}" role="tabpanel" aria-labelledby="#collapse_{{id}}">
                                <div class="panel-body">{{body}}</div>
                            </div>'
        ];
        return $config;
    }

    public static function dropdown()
    {
        $config = [
            'container' => '<div class="dropdown">{{container}}</div>',
            'title'     => '<a data-target="#" href="javascript:void(1)" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                   {{title}} <span class="caret"></span>
                               </a>',
            'ul'        => '<ul class="dropdown-menu" >{{ul}}</ul>',
            'li'        => '<li>{{li}}</li>'
        ];
        return $config;
    }

    public static function listGroup()
    {
        $config = [
            'container' => '<div class="list-container {{class}}">
                                <ul class="list-group">
                                {{container}}
                                </ul>
                            </div>',
            'item'      => '<li class="list-group-item">{{item}}</li>',
        ];
        return $config;
    }

    public static function modal()
    {
        $config = [
            'container' => '<div class="modal {{class}} {{visibility}} animated {{animation}}" id="{{id}}" role="dialog" aria-labelledby="...">
                                <div class="modal-dialog {{width}}"><div class="modal-content">{{container}}</div>
                                </div>
                            </div>',
            'closable' => '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
            'header'   => '<div class="modal-header">
                                {{closable}}
                                {{header}}
                            </div>',
            'body'     => '<div class="modal-body">{{body}}</div>',
            'footer'   => '<div class="modal-footer">{{footer}}</div>',
            'backdrop' => '<div class="modal-backdrop show in"></div>'
        ];
        return $config;
    }

    public static function panel()
    {
        $config = [
            'container' => '<div class="panel {{type}}">{{container}}</div>',
            'header'    => '<div class="panel-heading">{{header}}</div>',
            'body'      => '<div class="panel-body">{{body}}</div>',
            'footer'    => '<div class="panel-footer">{{footer}}</div>'
        ];
        return $config;
    }

    public static function  tab()
    {
        $config = [
            'container'  => '<div class="tab">{{container}}</div>',
            'tabcontent' => '<div class="tab-content" >{{tabcontent}}</div>',
            'tab'        => '<div aria-labelledby=".." class="tab-pane {{active}}" role="tabpanel" id="tab_{{target}}">{{tab}}</div>',
            'navcontent' => '<ul role="tablist" class="nav nav-tabs">{{navcontent}}</ul>',
            'nav'        => '<li role="presentation" class="{{active}}"><a aria-controls=".." data-toggle="tab" role="tab" href="#tab_{{target}}">{{nav}}</a></li>',
        ];
        return $config;
    }

    public static function  table()
    {
        $config = [
            'container' => '<div class="table-responsive-off"><table class="table {{type}} {{class}}">{{container}}</table></div>',
            'header'    => '<tr>{{header}}</tr>',
            'thead'     => '<thead><tr>{{thead}}</tr></thead>',
            'tbody'     => '<tbody>{{tbody}}</tbody>',
            'th'        => '<th class="{{class}}">{{th}}</th>',
            'td'        => '<td>{{td}}</td>',
            'tr'        => '<tr class="{{class}}">{{tr}}</tr>',
            'radio'     => '<input type="radio" name="{{name}}" value="{{value}}" {{checked}} class="{{class}}" order="{{order}}">',
            'nav'       => '<li role="presentation" class="{{active}}"><a aria-controls=".." data-toggle="tab" role="tab" href="#tab_{{target}}">{{nav}}</a></li>',
        ];
        return $config;
    }

    public static function well()
    {
        $config = [
            'container' => '<div class="well {{class}}">{{container}}</div>'
        ];
        return $config;
    }

}