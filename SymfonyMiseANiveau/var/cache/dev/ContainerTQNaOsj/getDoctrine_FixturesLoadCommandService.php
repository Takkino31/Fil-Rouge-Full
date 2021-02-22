<?php

namespace ContainerTQNaOsj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_FixturesLoadCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'doctrine.fixtures_load_command' shared service.
     *
     * @return \Doctrine\Bundle\FixturesBundle\Command\LoadDataFixturesDoctrineCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Command/DoctrineCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-fixtures-bundle/Command/LoadDataFixturesDoctrineCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/Loader.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/doctrine-bridge/DataFixtures/ContainerAwareLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-fixtures-bundle/Loader/SymfonyFixturesLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/FixtureInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/SharedFixtureInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/AbstractFixture.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-fixtures-bundle/ORMFixtureInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-fixtures-bundle/Fixture.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/DependentFixtureInterface.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/AdminFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/ApprenantFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/CmFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/CompetenceFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/FormateurFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/GroupeApprenantFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/GroupeCompetenceFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/GroupeTagFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/NiveauFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/ProfilFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/ProfilSortieFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/PromoFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/ReferentielFixtures.php';
        include_once \dirname(__DIR__, 4).'/src/DataFixtures/TagFixtures.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-fixtures-bundle/Purger/PurgerFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-fixtures-bundle/Purger/ORMPurgerFactory.php';

        $a = new \Doctrine\Bundle\FixturesBundle\Loader\SymfonyFixturesLoader($container);

        $b = ($container->services['security.password_encoder'] ?? $container->load('getSecurity_PasswordEncoderService'));
        $c = ($container->privates['App\\Repository\\FormateurRepository'] ?? $container->load('getFormateurRepositoryService'));
        $d = ($container->privates['App\\Repository\\ApprenantRepository'] ?? $container->load('getApprenantRepositoryService'));

        $a->addFixtures([0 => ['fixture' => new \App\DataFixtures\AdminFixtures($b), 'groups' => []], 1 => ['fixture' => new \App\DataFixtures\ApprenantFixtures($b), 'groups' => []], 2 => ['fixture' => new \App\DataFixtures\CmFixtures($b), 'groups' => []], 3 => ['fixture' => new \App\DataFixtures\CompetenceFixtures(), 'groups' => []], 4 => ['fixture' => new \App\DataFixtures\FormateurFixtures($b), 'groups' => []], 5 => ['fixture' => new \App\DataFixtures\GroupeApprenantFixtures($c, $d), 'groups' => []], 6 => ['fixture' => new \App\DataFixtures\GroupeCompetenceFixtures(), 'groups' => []], 7 => ['fixture' => new \App\DataFixtures\GroupeTagFixtures(), 'groups' => []], 8 => ['fixture' => new \App\DataFixtures\NiveauFixtures(), 'groups' => []], 9 => ['fixture' => new \App\DataFixtures\ProfilFixtures(), 'groups' => []], 10 => ['fixture' => new \App\DataFixtures\ProfilSortieFixtures($d), 'groups' => []], 11 => ['fixture' => new \App\DataFixtures\PromoFixtures($c, ($container->privates['App\\Repository\\ReferentielRepository'] ?? $container->load('getReferentielRepositoryService'))), 'groups' => []], 12 => ['fixture' => new \App\DataFixtures\ReferentielFixtures(), 'groups' => []], 13 => ['fixture' => new \App\DataFixtures\TagFixtures(), 'groups' => []]]);

        $container->privates['doctrine.fixtures_load_command'] = $instance = new \Doctrine\Bundle\FixturesBundle\Command\LoadDataFixturesDoctrineCommand($a, ($container->services['doctrine'] ?? $container->getDoctrineService()), ['default' => new \Doctrine\Bundle\FixturesBundle\Purger\ORMPurgerFactory()]);

        $instance->setName('doctrine:fixtures:load');

        return $instance;
    }
}
