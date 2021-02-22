<?php

namespace ContainerTQNaOsj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getReferentielDataPersisterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Datapersister\ReferentielDataPersister' shared autowired service.
     *
     * @return \App\Datapersister\ReferentielDataPersister
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/DataPersister/DataPersisterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/DataPersister/ContextAwareDataPersisterInterface.php';
        include_once \dirname(__DIR__, 4).'/src/Datapersister/ReferentielDataPersister.php';

        return $container->privates['App\\Datapersister\\ReferentielDataPersister'] = new \App\Datapersister\ReferentielDataPersister(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));
    }
}
