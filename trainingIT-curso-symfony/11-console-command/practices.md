
# Practices

Practices

## Notes

Conviene echar un vistazo a las mejoras introducidas en las nuevas versiones de symfony:

4.1: <https://symfony.com/blog/new-in-symfony-4-1-advanced-console-output>

4.2: <https://symfony.com/blog/new-in-symfony-4-2-console-tables-improvements>

4.3: <https://symfony.com/blog/new-in-symfony-4-3-console-hyperlinks>

4.4: <https://symfony.com/blog/new-in-symfony-4-4-console-improvements>

## Practice 11.1

Partiendo de la estructura de base de datos alumnos.sql.zip ya utilizada en otros ejercicios, crear un comando de consola personalizado que saque un listado de las notas medias de las asignaturas de un grado entre dos fechas dadas.

El comando se utilizaría de la siguiente manera:

`bin/console informes:notas nombregrado fechainicio fechafin`

Ejemplo:

`bin/console informes:notas “Ingeniería de montes” 2016-09-01 2017-08-31`

El informe debe de presentar el nombre de cada asignatura junto con la media de las notas de los alumnos en dicha asignatura entre las fechas dadas.

Subir un archivo zip con el proyecto exceptuando los directorios node_modules, var y vendor

[11.1_codigo.zip](/symfony/trainingIT/11-console-command/11.1_codigo.zip)

---

[<-- index-section](/symfony/trainingIT/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
