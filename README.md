### Pasos para levantar local

* crear aliases para localhost en el archivo hosts de la computadora, así funcionan local. Son los siguientes: site-tiendatax.local.tax.com y pma-tiendatax.local.tax.com
* realizar una copia propia del .env.example, llamada .env
* levantar las instancias con docker-compose: `docker-compose up -d`
* levantar las migrations: `docker-compose exec site /var/www/app/artisan migrate`
* cargar la data de prueba: `docker-compose exec site /var/www/app/artisan db:seed`
* ingresar a la página: `http://site-tiendatax.local.tax.com/products/34c4c97e-38bd-4b62-91de-89150b32fcee` Allí ya debería verse el producto y encargarlo.
* si el producto se agrega Ok, esto genera una tarea para el sistema queues. Se puede finalizar su ejecución mediante `exec site /var/www/app/artisan queue:work` (es un sistema mejorable con la implementación de supervisord o similar).

Algunos mejorables:

* Implementación de "Services" o UseCases para quitar responsabilidades al controller
* Tests al menos de aceptación
* Imple de validaciones con las opciones que Laravel ofrece