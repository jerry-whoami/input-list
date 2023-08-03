<?php

namespace JerryWhoami\InputList;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class InputListServiceProvider extends PluginServiceProvider
{
  public static string $name = 'input-list';

  protected array $styles = [
    'input-list' => __DIR__ . '/../public/css/app.css',
  ];

  public function configurePackage(Package $package): void
  {
    $package
      ->name(static::$name)
      ->hasConfigFile()
      ->hasViews();
  }
}
