<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap;

use Phinx\Config\Config;

class PhinxConfiguration
{
    /**
     * @param $envPath
     * @return Config
     * @throws \ErrorException
     */
    public static function envToConfigInterface($envPath)
    {
        if (false === file_exists($envPath)) {
            throw new \ErrorException(sprintf('Not env %s file founded!', $envPath));
        }

        $dotenv = \Dotenv\Dotenv::create($envPath);
        $dotenv->load();

        $configArray = [
            'paths' => [
                'migrations' => getenv('DATABASE_MIGRATIONS_PATH') ?? '%%PHINX_CONFIG_DIR%%/db/migrations',
                'seeds' => getenv('DATABASE_SEEDS_PATH') ?? '%%PHINX_CONFIG_DIR%%/db/seeds'
            ],
            'environments' => [
                'default_migration_table' => 'phinxlog',
                'default_database' => getenv('DATABASE_STAGE') ?? 'development',
                getenv('DATABASE_STAGE') ?? 'development' => [
                    'adapter' => getenv('DATABASE_ADAPTER') ?? 'mysql',
                    'host' => getenv('DATABASE_HOST') ?? 'localhost',
                    'name' => getenv('DATABASE_NAME') ?? 'development_db',
                    'user' => getenv('DATABASE_USER') ?? 'root',
                    'pass' => getenv('DATABASE_PASSWORD') ?? '',
                    'port' => getenv('DATABASE_PORT') ?? '3306',
                    'charset' => getenv('DATABASE_CHARSET') ?? 'utf8',
                ],
            ],
            'version_order' => getenv('DATABASE_VERSION') ?? 'creation'
        ];

        return new Config($configArray);
    }
}