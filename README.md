
# Proyecto Citas medicas

Este proyecto se a diseñado con el fin de poder gestionar en una lista las citas medicas de una clinica (xxxxx)

  

## Pre-Requisitos

 - PHP 5.5 +. 
 - Composer. 
 - mySql.
  

## Instalacion
  

 Para poder inicializar este proyecto es necesario descargar composer.  
 Puedes adquirirlo: [https://getcomposer.org/download/].  
 Una vez descargado e instalado composer procedemos con los siguientes
  pasos:  
  
  - Desde una terminal en la raiz del proyecto ejecutamos: 
 ```bash 
 composer install 
``` 

-Antes de instalar el ORM, para facilitar la configuracion debera crear una base de datos en mySql con el tipo de dato UTF8 en la cual se cargaran las tablas necesarias para el correcto funcionamiento de este proyecto.
 
  -  Luego para instalar el ORM que maneja nuestra base de datos
   ejecutamos : 
 ```bash
vendor/bin/propel init
```
- Esto con el fin de realizar la configuracion que el ORM nos pide.  
Ejemplo de la configuracion a seguir:
 ```bash
First we need to set up your database connection.

Please pick your favorite database management system:
  [mysql ] MySQL (En nuestro caso elegimos esta opcion)
  [sqlite] SQLite
  [pgsql ] PostgreSQL
  [oracle] Oracle
  [sqlsrv] MSSQL (via pdo-sqlsrv)
  [mssql ] MSSQL (via pdo-mssql)
 > mysql
```
- Luego pasamos a indicarle los parametros de conexion a nuestra base de datos
``` bash
Please enter your database host [localhost]: localhost 
Please enter your database port [xxxx]: [xxxx]   <-- Puerto de conexion
Please enter your database name: [xxx.xxx.xxx] <-- Nombre de tu base de datos
Please enter your database user [root]: root  <-- Usuario
Please enter your database password: 		<-- Contraseña ( de no tener dejarlo el campo vacio)
Which charset would you like to use? [utf8]: utf8
```
- Para evitar que PropelORM nos cree tablas de prueba y trabaje con las tablas de nuestro proyecto le indicamos que va a trabajar con una base de datos existente (Creada anteriormente)
```bash
Do you have an existing database you want to use with propel? [no]: yes
```
- Para evitar que PropelORM  reemplace la informacion ya creada para el proyecto, le indicamos una nueva ruta para el arvhivo schema.xml en la carpeta [generated-sql] :
```
Where do you want to store your schema.xml? [<RUTA>\citas_medicas]: 
<RUTA>\citas_medicas\generated-sql
```
- PropelORM nos preguntara donde guardaremos nuestros modelos, se le debe indicar la siguiente ruta [(RUTA)\citas_medicas\models]:
```
Where do you want propel to save the generated php models? [<RUTA>\citas_medicas]:  
<RUTA>\citas_medicas\models
```
- **IMPORTANTE!** El namespace por defecto de nuestro proyecto es [DB], si es cambiado puede generar errores en el funcionamiento del mismo.
 ```
 Which namespace should the generated php models use?: DB
 ```
 - Propel nos pedira el formato a usar para generar nuestro archivo de configuracion, debemos indicarle que use php para evitar posibles errores.
 ```
 Please enter the format to use for the generated configuration file (yml, xml, json, ini, php) [yml]:
  [0] yml
  [1] xml
  [2] json
  [3] ini
  [4] php
 >php
 ```
 - Una vez realizado los pasos anteriores, PropelORM nos pedira que verifiquemos los datos de configuracion, si todo es correcto, confirmamos con un yes en la terminal.
 ```
 Is everything correct? [no]: yes
 ```
 - Con esto ya tenemos nuestra configuracion hecha, sin embargo aun no hemos exportado las tablas a nuestra base de datos. Para hacerlo debemos copiar el contenido del schema.xml (Respaldo) hubicado en la raiz de nuestro proyecto, en este archivo conseguiremos la estructura de nuestras tablas.  
 
 - Una vez copiado dicho contenido, lo pegaremos en el archivo schema.xlm (Generado por la configuracion inicial de PropelORM) ubicado en la carpeta generated-sql, guardamos los cambios y en nuestra consola ejecutamos los siguientes comandos.
 ```

 vendor/bin/propel  model:build   //Con esto genera los archivos de los modelos
 vendor/bin/propel sql:build  --overwrite  // Genera el codigo SQL de nuestro schema.xml
 vendor/bin/propel sql:insert //Crea nuestras tablas en nuestra base de datos
 ```

- Si  realizamos los pasos anteriores correctamente, no deberiamos tener problemas al levantar nuestro proyecto.

## Estado del proyecto
in progress.. 