No have another library to manage migrations easily and simple with [phinx](https://phinx.org/), and i make this package to easily phinx commands or application console, is intention are you can add commands to your application console or use ````bin/phinxwrap```` by environments vars or inject ``Phinx\Config\Config`` to constructor of each command.
### install
`````php
composer require mdantas/phinx-wrap
`````
##### requirements
``phinx 0.10.6``

### Examples
````php
//In your app.php
//Config read from env or inject any place you need.
$config = \mdantas\PhinxWrap\PhinxConfiguration::envToConfigInterface(__DIR__.'/../')

$application = new \mdantas\PhinxWrap\ConsoleApplication(
        \mdantas\PhinxWrap\PhinxConfiguration::envToConfigInterface(__DIR__.'/../')
);
````

````php
public function __construct(ConfigInterface $config)
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
