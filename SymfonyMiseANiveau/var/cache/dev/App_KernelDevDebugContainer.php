<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerTQNaOsj\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerTQNaOsj/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerTQNaOsj.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerTQNaOsj\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerTQNaOsj\App_KernelDevDebugContainer([
    'container.build_hash' => 'TQNaOsj',
    'container.build_id' => '391e720b',
    'container.build_time' => 1613690403,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerTQNaOsj');
