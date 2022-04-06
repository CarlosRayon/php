
# Practices

Practices

## Notes

Para gmail, además, hay que seguir las instrucciones de gmail para configurar la propia cuenta de gmail para que permita que aplicaciones “inseguras” utilicen tu cuenta de gmail para enviar correos:

<https://support.google.com/accounts/answer/6010255>

Para desactivar la validación de certificados

<https://stackoverflow.com/questions/36454920/swiftmailer-php-how-to-disable-ssl-certificate-validation/41806706>

## Practice 16.1

En este ejercicio se debe utilizar el componente Mailer que viene a partir de symfony 4.3.

Dados los servicios descritos y definidos en el ejercicio 8.2, implementar el código de todos aquellos métodos que envían correos.

Realizar el ejercicio en el proyecto de la práctica final, ya que forma parte de ella.

NOTA: Es posible que en este punto sea necesario diseñar previamente la parte de roles de usuario, definir los atributos de varias entidades y empezar a realizar traducciones. Para la corrección, solamente es necesario enviar los servicios, el resto de elementos se corregirán al enviar la práctica final completa.

A continuación se recuerdan los párrafos de la práctica final en los que se describen los envíos de correos.

Al mandar una solicitud se enviará un correo al usuario con la misma información: características de la(s) aplicación(es), presupuesto aproximado y texto que deje claro que es un presupuesto orientativo.

También se enviará otro correo a todos los usuarios con rol "comercial" indicando los datos de contacto del solicitante, las características de la(s) aplicación(es) y el presupuesto orientativo.

Al aprobar una solicitud de presupuesto, se mandarán correos al solicitante y a los jefes de proyecto.

En el correo al solicitantes se indicarán las características de la solicitud y el presupuesto final en vez del presupuesto inicial. También se añadirá en el correo un enlace. (Ver sección: panel del solicitante)

En el correo a los jefes de proyecto se indicarán las características de la solicitud con el presupuesto final y la fecha de entrega.

Al cambiar de estado el proyecto, se mandará correo al solicitante y a los técnicos asociados al proyecto informando en el correo del nuevo estado del proyecto.

Al asignar un técnico a una tarea, se enviará un correo al técnico con la información de la tarea asignada.

Al marcar una tarea como terminada, se enviará un correo a los jefes de proyecto.

Los correos sí deben ser traducibles. Al solicitante se le enviará el correo en el idioma en el que hizo la solicitud. Al resto de usuarios se le enviarán los correos en el idioma que tenga configurado cada receptor del correo en su perfil.

---

[<-- index-section](/symfony/trainingIT/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
