<?php

namespace ContainerTQNaOsj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authentication_Provider_Guard_ApiService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.authentication.provider.guard.api' shared service.
     *
     * @return \Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/Authentication/Provider/AuthenticationProviderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-guard/Provider/GuardAuthenticationProvider.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserCheckerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserChecker.php';

        return $container->privates['security.authentication.provider.guard.api'] = new \Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['lexik_jwt_authentication.security.guard.jwt_token_authenticator'] ?? $container->load('getLexikJwtAuthentication_Security_Guard_JwtTokenAuthenticatorService'));
        }, 1), ($container->privates['security.user.provider.concrete.app_user_provider'] ?? $container->load('getSecurity_User_Provider_Concrete_AppUserProviderService')), 'api', ($container->privates['security.user_checker'] ?? ($container->privates['security.user_checker'] = new \Symfony\Component\Security\Core\User\UserChecker())), ($container->services['security.password_encoder'] ?? $container->load('getSecurity_PasswordEncoderService')));
    }
}
