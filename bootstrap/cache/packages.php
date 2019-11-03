<?php return array (
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'jeroennoten/laravel-adminlte' => 
  array (
    'providers' => 
    array (
      0 => 'JeroenNoten\\LaravelAdminLte\\ServiceProvider',
    ),
  ),
  'laravelcollective/html' => 
  array (
    'providers' => 
    array (
      0 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'mews/purifier' => 
  array (
    'providers' => 
    array (
      0 => 'Mews\\Purifier\\PurifierServiceProvider',
    ),
    'aliases' => 
    array (
      'Purifier' => 'Mews\\Purifier\\Facades\\Purifier',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'niklasravnsborg/laravel-pdf' => 
  array (
    'providers' => 
    array (
      0 => 'niklasravnsborg\\LaravelPdf\\PdfServiceProvider',
    ),
    'aliases' => 
    array (
      'PDF' => 'niklasravnsborg\\LaravelPdf\\Facades\\Pdf',
    ),
  ),
  'shipu/php-aamarpay-payment' => 
  array (
    'providers' => 
    array (
      0 => 'Shipu\\Aamarpay\\AamarpayServiceProvider',
    ),
    'aliases' => 
    array (
      'Aamarpay' => 'Shipu\\Aamarpay\\Facades\\Aamarpay',
    ),
  ),
);