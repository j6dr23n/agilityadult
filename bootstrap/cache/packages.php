<?php return array (
  'backpack/backupmanager' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\BackupManager\\BackupManagerServiceProvider',
    ),
  ),
  'backpack/crud' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\CRUD\\BackpackServiceProvider',
    ),
    'aliases' => 
    array (
      'CRUD' => 'Backpack\\CRUD\\app\\Library\\CrudPanel\\CrudPanelFacade',
      'Widget' => 'Backpack\\CRUD\\app\\Library\\Widget',
    ),
  ),
  'creativeorange/gravatar' => 
  array (
    'providers' => 
    array (
      0 => 'Creativeorange\\Gravatar\\GravatarServiceProvider',
    ),
    'aliases' => 
    array (
      'Gravatar' => 'Creativeorange\\Gravatar\\Facades\\Gravatar',
    ),
  ),
  'cyrildewit/eloquent-viewable' => 
  array (
    'providers' => 
    array (
      0 => 'CyrildeWit\\EloquentViewable\\EloquentViewableServiceProvider',
    ),
  ),
  'digitallyhappy/assets' => 
  array (
    'providers' => 
    array (
      0 => 'DigitallyHappy\\Assets\\AssetsServiceProvider',
    ),
    'aliases' => 
    array (
      'Assets' => 'DigitallyHappy\\Assets\\Facades\\Assets',
    ),
  ),
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
  'irazasyed/telegram-bot-sdk' => 
  array (
    'providers' => 
    array (
      0 => 'Telegram\\Bot\\Laravel\\TelegramServiceProvider',
    ),
    'aliases' => 
    array (
      'Telegram' => 'Telegram\\Bot\\Laravel\\Facades\\Telegram',
    ),
  ),
  'laravel/breeze' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Breeze\\BreezeServiceProvider',
    ),
  ),
  'laravel/sail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sail\\SailServiceProvider',
    ),
  ),
  'laravel/sanctum' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'pbmedia/laravel-ffmpeg' => 
  array (
    'providers' => 
    array (
      0 => 'ProtoneMedia\\LaravelFFMpeg\\Support\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'FFMpeg' => 'ProtoneMedia\\LaravelFFMpeg\\Support\\FFMpeg',
    ),
  ),
  'pion/laravel-chunk-upload' => 
  array (
    'providers' => 
    array (
      0 => 'Pion\\Laravel\\ChunkUpload\\Providers\\ChunkUploadServiceProvider',
    ),
  ),
  'prologue/alerts' => 
  array (
    'providers' => 
    array (
      0 => 'Prologue\\Alerts\\AlertsServiceProvider',
    ),
    'aliases' => 
    array (
      'Alert' => 'Prologue\\Alerts\\Facades\\Alert',
    ),
  ),
  'rap2hpoutre/laravel-log-viewer' => 
  array (
    'providers' => 
    array (
      0 => 'Rap2hpoutre\\LaravelLogViewer\\LaravelLogViewerServiceProvider',
    ),
  ),
  'spatie/laravel-backup' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Backup\\BackupServiceProvider',
    ),
  ),
  'spatie/laravel-ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Spatie\\LaravelIgnition\\Facades\\Flare',
    ),
  ),
  'spatie/laravel-image-optimizer' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\LaravelImageOptimizer\\ImageOptimizerServiceProvider',
    ),
    'aliases' => 
    array (
      'ImageOptimizer' => 'Spatie\\LaravelImageOptimizer\\Facades\\ImageOptimizer',
    ),
  ),
  'spatie/laravel-signal-aware-command' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\SignalAwareCommand\\SignalAwareCommandServiceProvider',
    ),
    'aliases' => 
    array (
      'Signal' => 'Spatie\\SignalAwareCommand\\Facades\\Signal',
    ),
  ),
  'spatie/laravel-sitemap' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Sitemap\\SitemapServiceProvider',
    ),
  ),
  'yajra/laravel-datatables-oracle' => 
  array (
    'providers' => 
    array (
      0 => 'Yajra\\DataTables\\DataTablesServiceProvider',
    ),
    'aliases' => 
    array (
      'DataTables' => 'Yajra\\DataTables\\Facades\\DataTables',
    ),
  ),
);