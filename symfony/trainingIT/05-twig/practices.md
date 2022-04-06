
# Practices

Practices

## Practice 5.1

Escribir un filtro de twig que calcule el tiempo transcurrido (tt) desde una fecha dada.

La forma de usar el filtro será

{{ variablefecha | tt }}
Este filtro debe transformar la diferencia entre la fecha actual y la fecha dada en strings de la forma que sigue:

Diferencia < 1 minuto => ‘Ahora’
1 minuto <= diferencia < 1 hora => ‘Hace X minutos’
1 hora <= diferencia < 1 día => ‘Hace X horas’
1 día <= diferencia < 1 mes => ‘Hace X días’
1 mes <= diferencia < 1 año => ‘Hace X meses’
1 año <= diferencia => ‘Hace X años y Y meses’

Siendo X la cantidad de tiempo correspondiente.

Subir un archivo de texto .php con la programación de la extensión.

[5.1_codigo.zip](/symfony/trainingIT/05-twig/5.1_codigo.zip)

---

[<-- index-section](/symfony/trainingIT/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
