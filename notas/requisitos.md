# Requisitos de software

    - PHP ^8.2  
    - Composer ^2.8  
    - Laravel Installer ^5.12  

## Chequeo de versiones
> en una terminal podemos escribir el siguiente comando:

    php -v  

    composer --version

    laravel installer --version

## actualizaciones
> puedo actualizar mi multi instalador de Xampp, Mamp, Laragon
 
> respecto de Composser desde una terminal podemos utilizar este comando

    composer self-update  

> para actualizar el Instalador de Laravell podemos

    composer global require laravel/laravel

> una opción un poco más robusta

    composer global update laravel/laravel  

> si no llegar a actualizarse vamos a forzar una reinstalación

    composer global remove laravel/laravel  
    composer global require laravel/laravel  


### Si queremos hacer un fresh install podemos utilizar estos métodos.

```macOS:

    /bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"
```     

```gnu/linux:

    /bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```     

```Windows PowerShell: 
    
    # Run as administrator...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```    

### Alternativa  (fresh insstall)
    Herd  <https://herd.laravel.com/>

### Node
> También podrías llegar a necesitar instalado  Node con NPM o Bun
