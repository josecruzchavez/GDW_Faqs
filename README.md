![gdw_faqs](https://php.gdw.mx/github_assets/gdw_faqs/gdw_faqs_01.jpg)

# GDW FAQs para Magento 2

[![Latest Stable Version](http://poser.pugx.org/gdw/faqs/v?style=for-the-badge)](https://packagist.org/packages/gdw/faqs) [![Total Downloads](http://poser.pugx.org/gdw/faqs/downloads?style=for-the-badge)](https://packagist.org/packages/gdw/faqs) [![PHP Version Require](http://poser.pugx.org/gdw/faqs/require/php?style=for-the-badge)](https://packagist.org/packages/gdw/faqs)

Este módulo tiene la finalidad de agregar Preguntas frecuentes (FAQs) a Magento 2.

## Compatibilidad
✓ Magento 2.4.0 a 2.4.3 (rama 4.x)


## Funciones destacadas
* Agregar preguntas frecuentes FAQs a cada producto.
* Schema FAQs creados automáticamente.
* Compatible con multitiendas.
* Se pueden agrupar FAQs y mostrar en donde sea.
* Se puede agregar una tab en la vista detalle de producto.
* Widget para visualizar FAQs en donde sea.
* 3 diseños.
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