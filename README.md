No have another library to manage migrations easily and simple like [phinx](https://phinx.org/), and i make this package to easily phinx commands or application console, is intention are you can add commands to your application console or use ````bin/phinxwrap```` by environments vars or inject ``Phinx\Config\Config`` to constructor of each command.
### install
`````php
composer require mdantas/phinx-wrap
//For generate env file, this not overwrite you env file.
vendor/bin/phinxwrap init_env
`````
##### requirements
``phinx 0.10.6``

#### Environment example
````dotenv
DATABASE_MIGRATIONS_PATH=%%PHINX_CONFIG_DIR%%/db/migrations
DATABASE_SEEDS_PATH=%%PHINX_CONFIG_DIR%%/db/seeds
DATABASE_VERSION=creation
DATABASE_STAGE=development
DATABASE_ADAPTER=mysql
DATABASE_NAME=development_db
DATABASE_USER=root
DATABASE_PASSWORD=
DATABASE_HOST=localhost
DATABASE_PORT=3306
DATABASE_CHARSET=utf8
````

### Examples
````php
//In your app.php
//Config read from env or inject any place you need.
$config = \mdantas\PhinxWrap\PhinxConfiguration::envToConfigInterface(__DIR__.'/../')

$application = new \mdantas\PhinxWrap\ConsoleApplication(
        $config
);
````

````php
public function __construct(\Phinx\Config\ConfigInterface $config)
{
    $this->addCommands([
        new Create($config),
        new Status($config),
        new Migrate($config),
        new Rollback($config),
        new SeedCreate($config),
        new SeedRun($config),
        new Test($config),
    ]);
}
````

### Note
All phinx commands are based on package [Symfony Console](https://packagist.org/packages/symfony/console).
