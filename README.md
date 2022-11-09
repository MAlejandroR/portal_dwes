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
   

Me baso en el siguiente tutorial https://www.itsolutionstuff.com/post/laravel-9-import-export-excel-and-csv-file-tutorialexample.html
```shell
cd portal_dwes
composer require psr/simple-cache:^1.0 maatwebsite/excel
composer require maatwebsite/excel   
```
Creamos un modelo llamado alumno, en principio solo necesito el modelo y la migración, pero voy a crear el recurso completo de momento
```shell
php artisan make:model Alumnos --all
```

Ahora voy a crear una clase de import en el controlador para importar datos de alumnos
Esta parte no la veo clara. La clase import me la permite crear el paquete que hemos instalado de ***maatwebsite***
```shell
php artisan make:import AlumnosImport --model=Alumnos 

```
Ahora en la clase import modificamos el método model para que retorne una instancia de Alumno
```php
   public function model(array $row)
    {
        return new Alumnos([
            //
            "Apellido1"=>$row['Apellido1'],
            "Apellido2"=>$row['Apellido2'],
            "Nombre"=>$row['Nombre'],
            "DNI"=>$row['DNI']
        ]);
    }

```
Aunque no lo voy a utilizar en prinicipio, siguiendo el manual, voy a crear una clase para exportar
```shell
php artisan make:export AlumnosExport --model=Alumnos
```
En esta clase agregamos el siguiente método
```php
    public function headings(): array
    {
        return ["Apellido1", "Apellido2", "Nombre","DNI"];
    }
```
En el controlador de alumnos, creamos los métodos export e import con el código siguiente
También creamos el método index que recuperará todos los alumnos
Igualemnte creamos la vista para visualizar todos los alumnos

Ahora creamos las rutas
```php
Route::controller(AlumnosController::class)->group(function(){
    Route::get('alumnos', 'index');
    Route::get('alumnos-export', 'export')->name('alumnos.export');
    Route::post('alumnos-import', 'import')->name('alumnos.import');
});

```
