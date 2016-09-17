Based on work from draperstud.io

## Installation

Pull in the package through Composer.

```php
"tshafer/laravel-service-provider":"dev-master"
```

## Usage

```php
<?php

namespace Vendor\Package;

use Tshafer\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations()
             ->publishConfig()
             ->publishViews()
             ->publishAssets()
             ->loadViews()
             ->loadTranslations()
             ->mergeConfig('package');
    }
}

```
