
# Practices

Practices

## Notes

Novedades desde Symfony 4.1

A partir de Symfony 4.1, en los listeners, ya no se busca por defecto un método llamado:
on + "camel-cased event name"
 Por defecto se busca ahora el método **__invoke()**.

Novedades desde Symfony 4.4
En la versión 4.4, ya no es necesaria la propiedad "event" cuando se configura el listenter: <https://symfony.com/blog/new-in-symfony-4-4-simpler-event-listeners>

Desde Symfony 4.3
En la versión 4.3 se han renombrado los siguientes Eventos del Kernel de Symfony:

- Renombrado FilterControllerArgumentsEvent a ControllerArgumentsEvent
- Renombrado FilterControllerEvent a ControllerEvent
- Renombrado FilterResponseEvent a ResponseEvent
- Renombrado GetResponseEvent a RequestEvent
- Renombrado GetResponseForControllerResultEvent a ViewEvent
- Renombrado GetResponseForExceptionEvent a ExceptionEvent
- Renombrado PostResponseEvent a TerminateEvent

## Practice 9.1

Imaginemos que nuestra aplicación symfony consiste únicamente de una API REST.
Tenemos también un servicio TokenValidatorService con un método validate($token) que nos devuelve un booleano indicando si un token es válido o no para acceder a la API.
En nuestro services.yaml tenemos activados autoconfigure y autowire.

Crear y configurar un subscriber que lance un AccessDeniedHttpException si se realiza una petición a cualquier url de la API con un token que no sea válido.

Subir un fichero zip o tar.gz con los ficheros creados o modificados para este propósito.

NO es necesario programar el servicio TokenValidatorService.

[9.1_codigo.zip](/symfony/trainingIT/09-events/9.1_codigo.zip)

## Practice 9.2

Igual que el ejercicio 9.1 pero con un listener en vez de con un subscriber.

Subir un fichero zip o tar.gz con los ficheros creados o modificados para este propósito.

NO es necesario programar el servicio TokenValidatorService.

[9.2_codigo.zip](/symfony/trainingIT/09-events/9.2_codigo.zip)

## Practice 9.3

Programar un EventSuscriber que:

1) Cuando ocurra el evento 'onPresupuestoSolicitado', llame al método o métodos de envío de correo correspondientes definidos en los servicios del ejercicio 8.2

2) Cuando ocurra el evento 'onPresupuestoAprobado' llame al método o métodos de envío de correo correspondientes definidos en los servicios del ejercicio 8.2

---

[<-- index-section](/symfony/trainingIT/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
