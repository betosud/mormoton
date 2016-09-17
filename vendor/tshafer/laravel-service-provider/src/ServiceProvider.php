<?php

namespace Tshafer\ServiceProvider;

use Illuminate\Support\ServiceProvider as IlluminateProvider;

/**
     * Class ServiceProvider.
     */
    class ServiceProvider extends IlluminateProvider
    {
        /**
         * @var string
         */
        protected $packageName;

        /**
         * @var array
         */
        protected $paths = [];

        /**
         * Perform post-registration booting of services.
         */
        public function boot()
        {
            //
        }

        /**
         * Register bindings in the container.
         */
        public function register()
        {
            //
        }

        /**
         * @param $path
         *
         * @return $this
         */
        public function setup($path)
        {
            $this->paths = [
                'migrations' => [
                    'src' => $path.'/../database/migrations',
                    'dest' => database_path('/migrations/%s_%s'),
                ],
                'seeds' => [
                    'src' => $path.'/../database/seeds',
                    'dest' => database_path('/seeds/%s'),
                ],
                'config' => [
                    'src' => $path.'/../config',
                    'dest' => config_path('%s'),
                ],
                'views' => [
                    'src' => $path.'/../resources/views',
                    'dest' => base_path('resources/views/vendor/%s'),
                ],
                'translations' => [
                    'src' => $path.'/../resources/translations',
                    'dest' => base_path('resources/lang/%s'),
                ],
                'assets' => [
                    'src' => $path.'/../public/assets',
                    'dest' => public_path('vendor/%s'),
                ],
                'routes' => [
                    'src' => $path.'/routes.php',
                    'dest' => null,
                ],
            ];

            return $this;
        }

        /**
         * @param array $files
         *
         * @return $this
         */
        protected function publishConfig(array $files = [])
        {
            $files = $this->buildFilesArray('config', $files);

            $paths = [];
            foreach ($files as $file) {
                $paths[ $file ] = $this->buildDestPath('config',
                    [$this->buildFileName($file)]);
            }

            $this->publishes($paths, 'config');

            return $this;
        }

        /**
         * @param array $files
         *
         * @return $this
         */
        protected function publishMigrations(array $files = [])
        {
            $files = $this->buildFilesArray('migrations', $files);

            $paths = [];
            foreach ($files as $file) {
                if (!class_exists($this->getClassFromFile($file))) {
                    $paths[ $file ] = $this->buildDestPath('migrations', [
                        date('Y_m_d_His', time()),
                        $this->buildFileName($file),
                    ]);
                }
            }

            $this->publishes($paths, 'migrations');

            return $this;
        }

        /**
         * @return $this
         */
        protected function publishViews()
        {
            $this->publishes([
                $this->paths[ 'views' ][ 'src' ] => $this->buildDestPath('views',
                    $this->packageName),
            ], 'views');

            return $this;
        }

        /**
         * @return $this
         */
        protected function publishAssets()
        {
            $this->publishes([
                $this->paths[ 'assets' ][ 'src' ] => $this->buildDestPath('assets',
                    $this->packageName),
            ], 'public');

            return $this;
        }

        /**
         * @param array $files
         *
         * @return $this
         */
        protected function publishSeeds(array $files = [])
        {
            $files = $this->buildFilesArray('seeds', $files);

            $paths = [];
            foreach ($files as $file) {
                $paths[ $file ] = $this->buildDestPath('seeds',
                    [$this->buildFileName($file)]);
            }

            $this->publishes($paths, 'seeds');

            return $this;
        }

        /**
         * @return $this
         */
        protected function loadViews()
        {
            $this->loadViewsFrom($this->paths[ 'views' ][ 'src' ], $this->packageName);

            return $this;
        }

        /**
         * @return $this
         */
        protected function loadTranslations()
        {
            $this->loadTranslationsFrom(
                $this->paths[ 'translations' ][ 'src' ], $this->packageName
            );

            return $this;
        }

        /**
         * @return $this
         */
        protected function loadRoutes()
        {
            if (!$this->app->routesAreCached()) {
                require $this->paths[ 'routes' ][ 'src' ];
            }

            return $this;
        }

        /**
         * @return $this
         */
        protected function publish(array $paths, $group = null)
        {
            $this->publishes($paths, $group);

            return $this;
        }

        /**
         * @param $file
         *
         * @return $this
         */
        protected function mergeConfig($file)
        {
            $this->mergeConfigFrom(
                $this->paths[ 'config' ][ 'src' ].'/'.$this->buildFileName($file),
                $this->packageName
            );

            return $this;
        }

        /**
         * @param $file
         *
         * @return string
         */
        private function buildFileName($file)
        {
            $file = basename($file);

            if (!ends_with($file, '.php')) {
                $file = $file.'.php';
            }

            return $file;
        }

        /**
         * @param $type
         * @param $args
         *
         * @return string
         */
        private function buildDestPath($type, $args)
        {
            return vsprintf($this->paths[ $type ][ 'dest' ], $args);
        }

        /**
         * @param $type
         * @param $files
         *
         * @return array
         */
        private function buildFilesArray($type, $files)
        {
            $path = $this->paths[ $type ][ 'src' ];

            if (empty($files)) {
                $files = [];

                foreach (glob($path.'/*.php') as $file) {
                    $files[] = $file;
                }
            } else {
                foreach ($files as $key => $value) {
                    $files[] = $path.'/'.$this->buildFileName($value);
                    unset($files[ $key ]);
                }
            }

            return $files;
        }

        /**
         * @param $path
         *
         * @return mixed
         */
        private function getClassFromFile($path)
        {
            $count = count($tokens = token_get_all(file_get_contents($path)));

            for ($i = 2; $i < $count; ++$i) {
                if ($tokens[ $i - 2 ][ 0 ] == T_CLASS && $tokens[ $i - 1 ][ 0 ] == T_WHITESPACE && $tokens[ $i ][ 0 ] == T_STRING) {
                    return $tokens[ $i ][ 1 ];
                }
            }
        }
    }
