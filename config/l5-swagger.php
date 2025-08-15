<?php

return [
  'generate_always' => false,
  'paths' => [
    'docs' => storage_path('api-docs'), // << pasta onde o JSON fica
    'docs_json' => 'api-docs.json',     // << seu arquivo
    'annotations' => [],
  ],
  'documentations' => [
    'default' => [
      'routes' => [
        'api' => 'api/documentation', // UI
        'docs' => 'docs',             // endpoint do JSON (usa ?api-docs.json)
        'assets' => 'api-docs/swagger-ui-assets',
        'middleware' => [],
      ],
    ],
  ],
];

