<?php namespace x\panel\route;

function __tweaks($_) {
    \extract($GLOBALS, \EXTR_SKIP);
    $_['status'] = 200;
    $_['type'] = 'state';
    $_['lot']['bar']['lot'][0]['lot']['search']['skip'] = true;
    $_['lot']['bar']['lot'][0]['lot']['set']['skip'] = true;
    $_['lot']['desk']['lot']['form']['data']['path'] = 'x/panel.tweak';
    $_['lot']['desk']['lot']['form']['data']['file']['name'] = 'state.php';
    $lot = [];
    foreach (\g(__DIR__ . \D . '..' . \D . '..' . \D . 'tweak', 'php') as $k => $v) {
        $lot[$n = \basename($k, '.php')] = [
            'name' => 'state[' . $n . ']',
            'value' => 1,
            'title' => $n
        ];
    }
    $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['tweaks'] = [
        'lot' => [
            'tweaks' => [
                'block' => true,
                'lot' => $lot,
                'type' => 'items',
                'value' => (array) ($state->x->{'panel.tweak'} ?? [])
            ]
        ],
        'stack' => 10,
        'type' => 'fields'
    ];
    return $_;
}