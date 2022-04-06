
# Practices

Practices

## Notes 1

Novedad desde Symfony 4.3

Conviene echar un vistazo a las mejoras introducidas en la versión 4.3: <https://symfony.com/blog/new-in-symfony-4-3-workflow-improvements>

Novedad desde Symfony 4.3

Antes se debía configurar por un lado el tipo de workflow (workflow o state_machine) y por otro lado el tipo de marking_store (single_state o multiple_state). Esto hacía un total de 4 combinaciones posibles. Desde symfony 4.3 solamente hay 2 combinaciones: workflow o state_machine. Workflow implica multiple_state y state_machine implica single_state.

## Practice 21.1

Configurar los dos workflows descritos en la práctica final.

## Practice 21.2

 Suscribiros a algún evento de los workflows (con un EventSubscriber) para enviar los correos correspondientes asociados a los cambios de estado de los proyectos y de las tareas indicados en el enunciado de la práctica final.

- Al cambiar de estado el proyecto, se mandará correo al solicitante y a los técnicos asociados al proyecto informando en el correo del nuevo estado del proyecto.
- Al marcar una tarea como terminada, se enviará un correo a los jefes de proyecto.
Enviar el archivo o archivos en el que se haya programado el subscriber o los subscribers.

## Practice 21.3

Programar el código necesario para que la aplicación no permita pasar un proyecto a terminado si queda alguna de las tareas del proyecto sin terminar.

## Notes 2

Me hubiera haber ahorrado el
`if($event->getTransition()->getName() == "to_finished")`
 si me suscrito al evento
 `'workflow.project_task.completed.to_finished' => 'onProjectTaskFinished'`
--

---

[<-- index-section](/symfony/trainingIT/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
