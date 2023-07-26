# Crear evento y subscriptor evento

Supongamos que queremos modificar un campo de una _ServiceOrder_ al editar una _WorkOrder_ asociada.

## [Creamos el evento](https://symfony.com/doc/5.4/components/event_dispatcher.html#creating-an-event-class)

Creamos un objeto que extienda de Event donde definimos los datos que vamos a recibir.

```php
namespace App\Event;

use App\Entity\ServiceOrder;
use Symfony\Contracts\EventDispatcher\Event;

class LastWorkOrderStartDateEvent extends Event
{
    public const NAME = 'last.workorder.start.date';

    private ServiceOrder $serviceOrder;

    public function __construct(ServiceOrder $serviceOrder)
    {
        $this->serviceOrder = $serviceOrder;
    }

    public function getServiceOrder(): ServiceOrder
    {
        return $this->serviceOrder;
    }
}
```

## [Creamos el subscriptor](https://symfony.com/doc/5.4/components/event_dispatcher.html#using-event-subscribers)

Lo podemos crear por consola. (Cuando no pida el evento le pasamos el NAME del evento)

`bin/console make:subscriber`

```php
namespace App\EventSubscriber;

use App\Entity\WorkOrder;
use Doctrine\ORM\EntityManagerInterface;
use App\Event\LastWorkOrderStartDateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LastWorkOrderStartDateSubscriber implements EventSubscriberInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            LastWorkOrderStartDateEvent::NAME => 'onLastWorkorderStartDate',
            /* Podemos tener mas evento para un mismo subscriptor */
            // ExampleOtherEvent::NAME => 'onExampleOther'
        ];
    }

    public function onLastWorkorderStartDate($event)
    {
            $serviceOrder = $event->getServiceOrder();

            /** @var WorkOrderRepository $workOrderRepository */
            $workOrderRepository = $this->entityManager->getRepository(WorkOrder::class);

            /* De las WorkOrder asociadas al ServiceOrder, obtengo la que tenga un campo tipo datetime mas alto */
            $lastWorkOrderStartDate = $workOrderRepository->getLastWorkOrderStartDate($serviceOrder->getId());
            $serviceOrder->setLastWorkOrderStartDateTime($lastWorkOrderStartDate->getStartDateTime());

            $this->entityManager->persist($serviceOrder);
            $this->entityManager->flush();
    }

    // public function onExampleOther($event){}
}

```

## [Usamos el EventDispatcher para lanzar el evento](https://symfony.com/doc/5.4/components/event_dispatcher.html#dispatch-the-event)

En cualquier punto de nuestra aplicación disparamos el evento con el objecto _EventDispatcher_

```php

// . . .


$this->dispatcher->dispatch(new LastWorkOrderStartDateEvent(ServiceOrder $serviceOrder), LastWorkOrderStartDateEvent::NAME);
```

---

[<-- index section](/symfony/events/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
