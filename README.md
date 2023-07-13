# GDW FAQs para Magento 2
Este módulo tiene la finalidad de agregar Preguntas frecuentes a magento 2.
## Compatibilidad
✓ Magento 2.3.x, ✓ Magento 2.4.x


## Funciones destacadas
* Agregar preguntas frecuentes a cada producto.
* Schema FAQs creados automáticamente.
* Compatible con multitiendas.
* Se pueden agrupar FAQs y mostrar en donde sea.
* Se puede agregar una tab en la vista detalle de producto.
* Widget para visualizar FAQs en donde sea.
* 3 diseños sencillos.
* Módulo gratuito.
<br/>

###### Ejecuta los siguientes comandos en la ruta base de Magento.

### Instalación

```
composer require gdw/faqs

php bin/magento module:enable GDW_Faqs
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Actualización

```
composer update gdw/faqs

php bin/magento module:enable GDW_Faqs
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Eliminación

```
php bin/magento module:disbale GDW_Faqs
composer remove gdw/faqs
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Expresiones de Gratitud

* 📢 Comenta a otros sobre este proyecto.
* 👨🏽‍💻 Da las gracias públicamente.
* [🍺 Invítame una cerveza](https://www.paypal.me/gestiondigitalweb)


### Otros enlaces

* [ Sitio web](https://gdw.mx/?utm_source=github&utm_medium=gdw&utm_campaign=faqs&utm_id=link)
* [Listado de Módulos](https://gdw.mx/modulos/)
* [Facebook](https://www.facebook.com/GestionDigitalWeb)
* [Youtube](https://www.youtube.com/c/Gestiondigitalweb)