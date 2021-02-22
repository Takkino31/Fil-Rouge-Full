<?php

namespace ContainerTQNaOsj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KkHakchService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.KkHakch' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.KkHakch'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'refRepo' => ['privates', 'App\\Repository\\ReferentielRepository', 'getReferentielRepositoryService', true],
            'referentielService' => ['privates', 'App\\Services\\ReferentielServices', 'getReferentielServicesService', true],
            'skillsGrpRepo' => ['privates', 'App\\Repository\\GroupeCompetenceRepository', 'getGroupeCompetenceRepositoryService', true],
        ], [
            'em' => '?',
            'refRepo' => 'App\\Repository\\ReferentielRepository',
            'referentielService' => 'App\\Services\\ReferentielServices',
            'skillsGrpRepo' => 'App\\Repository\\GroupeCompetenceRepository',
        ]);
    }
}
