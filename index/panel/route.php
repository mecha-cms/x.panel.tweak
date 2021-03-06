<?php namespace x\panel\route;

function __tweak($_) {
    \extract($GLOBALS, \EXTR_SKIP);
    // Disable page offset feature
    if (!empty($_['part'])) {
        $_['kick'] = \x\panel\to\link(['part' => 0]);
        return $_;
    }
    $_['status'] = 200;
    $_['type'] = 'state';
    $_['lot']['bar']['lot'][0]['lot']['search']['skip'] = true;
    $_['lot']['bar']['lot'][0]['lot']['set']['skip'] = true;
    $_['lot']['desk']['lot']['form']['values']['file']['name'] = 'state.php';
    $_['lot']['desk']['lot']['form']['values']['path'] = 'x/panel.tweak';
    $lot = [];
    foreach (\g(__DIR__ . \D . '..' . \D . '..' . \D . 'tweak', 'php') as $k => $v) {
        $lot[$n = \basename($k, '.php')] = [
            'name' => 'state[' . $n . ']',
            'value' => 1,
            'title' => $n
        ];
    }
    $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['file']['skip'] = true;
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