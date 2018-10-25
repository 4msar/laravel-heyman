<?php

namespace Imanghafoori\HeyMan\Boot;

use Imanghafoori\HeyMan\Chain;
use Imanghafoori\HeyMan\Conditions\ConditionsFacade;
use Imanghafoori\HeyMan\HeyMan;
use Imanghafoori\HeyMan\Reactions\ReactionFactory;
use Imanghafoori\HeyMan\Switching\HeyManSwitcher;
use Imanghafoori\HeyMan\WatchingStrategies\AllChains;
use Imanghafoori\HeyMan\WatchingStrategies\EloquentModels\EloquentEventsManager;
use Imanghafoori\HeyMan\WatchingStrategies\Events\EventManager;
use Imanghafoori\HeyMan\WatchingStrategies\Routes\RouterEventManager;
use Imanghafoori\HeyMan\WatchingStrategies\Views\ViewEventManager;
use Imanghafoori\HeyMan\WatchingStrategies\Views\ViewNormalizer;
use Imanghafoori\HeyMan\YouShouldHave;

class Singletons
{
    public static function make($app)
    {
        $singletons = self::singletons();

        foreach ($singletons as $class) {
            $app->singleton($class, $class);
        }
        $app->singleton('heyman.chain', Chain::class);
        $app->singleton('AllChains', AllChains::class);
    }

    /**
     * @return array
     */
    private static function singletons(): array
    {
        return [
            HeyManSwitcher::class,
            HeyMan::class,
            YouShouldHave::class,
            ReactionFactory::class,
            EventManager::class,
            RouterEventManager::class,
            ViewEventManager::class,
            EloquentEventsManager::class,
            ViewNormalizer::class,
            ConditionsFacade::class,
            Chain::class,
        ];
    }
}
