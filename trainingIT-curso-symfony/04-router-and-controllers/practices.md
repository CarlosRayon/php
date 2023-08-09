
# Practices

Practices

## Practice 4.1

Se necesita crear una acción para mostrar los artículos de un blog.

La acción en concreto mostrará el artículo en concreto en el idioma que venga en la url. Solamente se contemplan los idiomas español (es), inglés (es) y francés (fr).
La misma acción devolverá el contenido del artículo en formato html o en formato rss según la extensión indicada en la ruta. El formato por defecto, si no se indica extensión, será html
Para compartir por redes sociales, por SEO, para tener rutas amigables, etc, tanto el idioma como el título del artículo estarán incluidos en la ruta.

Ejemplos de urls posibles:

/articles/es/2010/mi-post
/articles/en/2010/my-post.rss
/articles/es/2013/mi-otro-post.html

Definir la ruta en formato anotación y en formato yaml.

[4.1_codigo.zip](/symfony/trainingIT/04-router-and-controllers/4.1_codigo.zip)

---

[<-- index-section](/symfony/trainingIT/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
