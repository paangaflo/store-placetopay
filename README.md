<p align="center"><img src="https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay/images/logos/placetopay-logo.svg" width="400px" alt="logo"></p>

## Acerca del proyecto

Tienda online que tiene por default nueve productos cargados; cada producto cuenta con, descripción, categoría, imagen del producto,  un stock de disponibilidad y un valor para comprar. Permite generar una simulación de comprar atreves de la pasarela de pagos de PlacetoPay.

Cuando ya no se encuentran disponibilidades del producto en stock el botón de compra es deshabilitado.

La tienda tiene un menú desplegable con las siguientes opciones:

Total de pedidos registrado en la tienda.

Total de pedidos registrados por el usuario.

Opción de salir del sistema.

## Características de implementación

Cuenta con internacionalización de lenguaje.

Las imágenes del proyecto son alojadas desde un servidor externo; bucket S3 de Amazon AWS.

## Demo del proyecto

El demo se encuentra alojado en el siguiente hosting de Heroku:
Para ingresar cree una cuenta en la opción de Registrer y después ingrese al sitio con la misma cuenta.

[http://store-placetopay.herokuapp.com](http://store-placetopay.herokuapp.com)

## Instalacion del proyecto

Clonar repositorio:
```shell script
git clone https://github.com/paangaflo/store-placetopay.git store-placetopay
```
Ingresamos a la carpeta:
```shell script
cd store-placetopay
```
Instalamos las dependencias de composer:
```shell script
composer install
```
Instalamos las dependencias de npm:
```shell script
npm install
```
Cree una copia de su archivo .env:
```shell script
cp .env.example .env
```
Genere una llave de encriptación para la app:
```shell script
php artisan key:generate
```
En el archivo .env, agregue información de la base de datos para permitir que Laravel se conecte a la base de datos. Los campos necesarios son los siguientes:
```shell script
DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD and DB_CONNECTION=mysql
```
Ejecute el comando migrate para inicializar la base de datos:
```shell script
php artisan migrate
```
Ejecute el comando migrate –seed  para la inserción de datos sobre la base de datos:
```shell script
php artisan migrate --seed
```
Compilar el proyecto en ambiente DEV:
```shell script
npm run dev
```
Desplegar en local el proyecto:
```shell script
php artisan serve
```
Ingresar en el navegador web a la siguiente ruta:
```shell script
http://127.0.0.1:8000
```
Debe ingresar en su archivo .env las credenciales de autenticación para consumir los servicios de la pasarela de pagos de PlacetoPay. Solicite las claves de ambiente desarrollo al personal administrativo de PlacetoPay.
```shell script
PLACETOPAY_API_SERVICE_URL_BASE=https://dev.placetopay.com/redirection/
PLACETOPAY_API_SERVICE_LOGIN=
PLACETOPAY_API_SERVICE_TRANKEY=
```
OPCIONAL: Para poder visualizar en el navegador web las imágenes del proyecto alojadas en el bucket S3 de Amazon AWS; debe solicitar al propietario del repositorio en GitHub las credenciales del mismo y agregarlas en las variables de entorno de su archivo .env (Por seguridad de la cuenta AWS las credenciales no son publicadas en esta documentación).
```shell script
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=bucket-heroku-assets
AWS_URL_BUCKET=https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay
```
Si la instalación fue correcta podrá ver la siguiente imagen en su navegador web:
<p align="center"><img src="https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay/images/screen_project.png" width="700px" alt="logo"></p>




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
