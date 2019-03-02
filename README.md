### Descripción General

#### Sistema basico de pedidos en linea desarrollado en Laravel, ideal para una empresa distribuidora de productos de distintas cateogrias.



## Contenido 
1. [ Reglas del negocio. ](#rules)
2. [ Escalabilidad. ](#scal)
3. [ Habilidades adquiridas al desarrollar el proyecto. ](#skills)


<a name="rules"></a>
## 1. Reglas del negocio (iniciales)

Un cliente que desee adquirir uno o más productod debe registrarse en el sistema y completar su informacion básica, posterior a ello tendrá acceso a su carrito de compras, al cual podrá añadir todos los productos que desee y que esten disponibles de acuerdo a la cantidad que solicite.

Para visualizar los productos dentro del carrito asi como el total a pagar, el cliente puede hacer click en su nombre ubicado en la esquina superior derecha de la barra de navegación, donde tendrá acceso a su dashboard. En el dashboard podrá ver 2 pesatañas, la primera corresponde a los productos dentro del carrito de compras y la segunda, a los pedidos realizados.

En la pestaña de carrito de compras el cliente podrá ver cada producto agregado de forma detallada ademas de la opción para eliminarlo del carrito en caso de que no lo desee.

Cuando la compra sea finalizada, el usuario podrá presionar el boton de **Realizar pedido**, de esta forma el carrito se vaciará y sus productos se empaquetarán en un pedido, el cual podra observar en la pestaña de *pedidos*, a la espera de que el usuario administrador 

Un pedido consta de 3 estados *pendiente* (estado inicial), *Aprobado*, *Cancelado* y *Finalizado*, es el usuario administrador del sistema es el encargado de cambiar el status.

* Pendiente: El status inicial de un pedido luego de que el cliente desee comprar la serie de productos que lo conforman.
* Aprobado: El pedido está listo para ser facturado por el cliente.
* Cancelado: Hubo alguna irregularidad en el proceso y no puede entregarse.
* Finalizado: El pedido fue entregaado exitosamente al cliente.


La comunicacion entre el cliente y el usuario administrador de la aplicación se realiza via email **(funcionalidad no implementada inicialmente)** asi como los metodos y formas de pago utilizadas.


Un usuario administrador es un usuario del sistema designado por la empresa, encargado de:

* Agregar nuevos productos y asignarles una categoria a la cual deben pertenecer.
* Editar y eliminar los productos existentes y las categorias a los que pertenecen.
* Agregar y desactivar usuarios adminsitradores.
* Cambiar el status de los pedidos de un cliente según corresponda.
* Visualizar las dudas o consultas realizadas por clientes registrados o no registrados en su dashboard y responderlas **inicialmente** via email. 


<a name="scal"></a>
## 2. Escalabilidad

De acuerdo a los conocimientos que adquiera en el tiempo, la aplicacion podrá disponer de:

1. Un buzon de mensajes para facilitar la comunicacion entre el cliente y el (los) administrador(es), asi como implementar un sistema de notificaciones.
2. Hacer posible el envio de e-mails.
3. Mejorar algunos aspectos de las vistas (Diseño y funcionalidades adicionales de las paginas de produto y categorias).
4. Crear una pagina de perfil de usuario y permitirle editarlo.
5. Implementar un sistema de metodos y formas de pago real.


<a name="skills"></a>
## 3. Habilidades adquiridas al desarrollar el proyecto

* Uso del laravel client Artisan.
* Scaffolding de un proyecto en laravel, archivos de configuracion y de bases de datos, ubicacion de los modelos, las vistas y los controladores.
* Sistema basico de rutas, rutas que deben ser protegidas con middlewares.
* Sistema de plantillas de blade.
* Migraciones y comandos para ejecutarlas, deshacerlas y eliminarlas
* Generacion de datos falsos; seeders y factories. (basico - medio).
* Desarrollo de CRUD's en laravel.
* ORM Eloquent para ejecutar consultas y obtener registros (basico).
* consola interactiva de PHP, Thinker.
* Creacion de relaciones a nivel de modelos con eloquent (hasOne, hasMany, belongsTo, manyToMany).
* namespaces para controladores y metodoy Accessors y Mutators en los modelos.


> *Desarrollado en Laravel v-5.7, Sistema Operativo Debian Jessie*. 
README.markdown elaborado por Gabriel Antonio

