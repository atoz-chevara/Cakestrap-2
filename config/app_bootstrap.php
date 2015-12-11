<?php
return [

    'Plugin.Bootstrap'   => [
        'Templates' => [
            'Form'=>[
                'standard' => [
                    'formstart'      => '<form class="" {{attrs}}>',
                    'input'          => '<input type="{{type}}" name="{{name}}" {{attrs}} />',
                    'label'          => '<i {{attrs}}></i>',
                    'inputContainer' => '<div class="form-group {{required}}" form-type="{{type}}">{{content}}</div>',
                    'inputContainerError' => '<div class="form-group {{type}}{{required}} contain-error">{{content}}{{error}}</div>',
                    'inputSubmit'    => '<input type="{{type}}"{{attrs}} class="btn btn-primary"/>',
                    'error'          => '<span class="error">{{content}}</span>',
                ],
                'default' => [
                    'formstart'      => '<form class="form-horizontal" {{attrs}}>',
                    'input'          => '<div class="col-sm-10">
                                            <input type="{{type}}" name="{{name}}" class="form-control" {{attrs}} />
                                         </div>',
                    'label'          => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
                    'inputContainer' => '<div class="form-group {{required}}" form-type="{{type}}">{{content}}</div>',
                    'inputContainerError' => '<div class="form-group {{type}}{{required}} contain-error">{{content}}{{error}}</div>',
                    'inputSubmit'    => '<input type="{{type}}"{{attrs}}/>',
                    'select'         => '<div class="col-sm-10"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
                    'error'          => '<span class="error">{{content}}</span>',
                ],
            ]
        ]
    ]

];