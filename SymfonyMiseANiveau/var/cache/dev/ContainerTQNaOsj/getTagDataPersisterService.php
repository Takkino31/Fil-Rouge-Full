<?php

namespace ContainerTQNaOsj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTagDataPersisterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Datapersister\TagDataPersister' shared autowired service.
     *
     * @return \App\Datapersister\TagDataPersister
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/DataPersister/DataPersisterInterface.php';
        include_once \dirname(__DIR__, 4).'/src/Datapersister/TagDataPersister.php';

        return $container->privates['App\\Datapersister\\TagDataPersister'] = new \App\Datapersister\TagDataPersister(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));
    }
}
