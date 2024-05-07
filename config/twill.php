<?php

return [
    'block_editor' => [
        'use_twill_blocks' => [],
        'crops' => [
            'highlight' => [
                'desktop' => [
                    [
                        'name' => 'desktop',
                        'ratio' => 16 / 9,
                    ],
                ],
                'mobile' => [
                    [
                        'name' => 'mobile',
                        'ratio' => 1,
                    ],
                ],
            ],
            'logo' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ]
                ]
            ],
            'favicon' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ]
                ]
            ],
            'default_social_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1.91 / 1,
                        'minValues' => [
                            'width' => 1200,
                            'height' => 627,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
