
# Practices

Practices

## Practice 13.1

Este ejercicio mezcla algo del tema de Seguridad con el tema actual del Profiler.

Supongamos que vamos a desarrollar una aplicación cuyos contenidos son distintos según la edad del usuario. Para la fase de desarrollo de esta aplicación a los desarrolladores les vendría muy bien que apareciera en la barra de depuración la edad del usuario actual y alguna otra información mientras desarrollan y testean la aplicación.

Las tareas a realizar en este ejercicio son las siguientes:

1º) Crear una entidad Usuario y configurarla como provider en el security.yaml. Esta entidad Usuario tendrá, además de las propiedades que considere el alumno, una propiedad para almacenar el nombre del usuario, otra para almacenar los apellidos del usuario y otra para almacenar la fecha de nacimiento del usuairo.

2º) Configurar el método de encriptación de passwords con cualquiera que no sea plain.

3º) Dar de alta a mano en la base de datos un par de usuarios.

4º) Configurar formulario de login como método de Autenticación.

5º) Programar la lógica necesaria para que los usuarios puedan hacer login

6º) Crear un Data Collector que muestre en la Web Debug Toolbar la edad del usuario actual y sus iniciales.

[13.1_codigo.zip](/symfony/trainingIT/13-profiler/13.1_codigo.zip)

---

[<-- index-section](/symfony/trainingIT/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
