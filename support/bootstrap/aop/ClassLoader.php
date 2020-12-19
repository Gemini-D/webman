<?php
namespace support\bootstrap\aop;

use Hyperf\AopIntegration\Provider\ContainerProvider;
use Hyperf\Di\Aop\AstVisitorRegistry;
use Hyperf\Di\Aop\ProxyCallVisitor;
use Hyperf\Di\ClassLoader as Loader;
use Hyperf\Pimple\ContainerFactory;

class ClassLoader extends Loader
{
    public static function init(?string $proxyFileDirPath = null, ?string $configDir = null): void
    {
        if (! AstVisitorRegistry::exists(ProxyCallVisitor::class)) {
            AstVisitorRegistry::insert(ProxyCallVisitor::class, PHP_INT_MAX / 2);
        }

        parent::init($proxyFileDirPath, $configDir);
    }

    protected function loadDotenv(): void
    {
    }
}
