## Portal dwes
Es una aplicación para acceder a los recursos del módulo de desarrollo web en el cpi fp los enlaces

## Importar datos de una excell
Vamos a realizar un acceso restringido a los alumnos con user y pass su dni
Para ello importaremos los datos de sigad
Todos los datos serán confidenciales, cifrados y tratados siguiendo las leyes actuales del tratamiento automatizado de los datos (LORTAD)

### Desarrollo
Creamos un proyecto en laravel
```shell
laravel new portal_dwes --git
```
Instalamos la librería ***maatwebsite***
   

Me baso en el siguiente tutorial https://www.itsolutionstuff.com/post/laravel-maatwebsite-set-background-color-of-column-exampleexample.html
```shell
cd portal_dwes
composer require maatwebsite/excel   
```
El proceso de instlación me rebota un error, de momento lo dejo pendiente
```php
PHP Fatal error:  Declaration of Maatwebsite\Excel\Cache\MemoryCache::get($key, $default = null) must be compatible with Psr\SimpleCache\CacheInterface::get(string $key, mixed $default = null): mixed in /home/oem/laravel/portal_dwes/vendor/maatwebsite/excel/src/Cache/MemoryCache.php on line 62

Symfony\Component\ErrorHandler\Error\FatalError

Declaration of Maatwebsite\Excel\Cache\MemoryCache::get($key, $default = null) must be compatible with Psr\SimpleCache\CacheInterface::get(string $key, mixed $default = null): mixed

at vendor/maatwebsite/excel/src/Cache/MemoryCache.php:62
58▕
59▕     /**
60▕      * {@inheritdoc}
61▕      */
➜  62▕     public function get($key, $default = null)
63▕     {
64▕         if ($this->has($key)) {
65▕             return $this->cache[$key];
66▕         }


Whoops\Exception\ErrorException

Declaration of Maatwebsite\Excel\Cache\MemoryCache::get($key, $default = null) must be compatible with Psr\SimpleCache\CacheInterface::get(string $key, mixed $default = null): mixed

at vendor/maatwebsite/excel/src/Cache/MemoryCache.php:62
58▕
59▕     /**
60▕      * {@inheritdoc}
61▕      */
➜  62▕     public function get($key, $default = null)
63▕     {
64▕         if ($this->has($key)) {
65▕             return $this->cache[$key];
66▕         }

      +1 vendor frames 
2   [internal]:0
Whoops\Run::handleShutdown()
Script @php artisan package:discover --ansi handling the post-autoload-dump event returned with error code 255
➜  portal_dwes git:(m
```

