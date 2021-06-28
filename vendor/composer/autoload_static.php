<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit146b3efcdf7f83008004ad68b802a312
{
    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Category' => __DIR__ . '/../..' . '/models/Category.php',
        'CategoryManager' => __DIR__ . '/../..' . '/models/CategoryManager.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'ControllerCategory' => __DIR__ . '/../..' . '/controllers/ControllerCategory.php',
        'ControllerParticipants' => __DIR__ . '/../..' . '/controllers/ControllerParticipants.php',
        'ControllerRun' => __DIR__ . '/../..' . '/controllers/ControllerRun.php',
        'ControllerTrial' => __DIR__ . '/../..' . '/controllers/ControllerTrial.php',
        'Model' => __DIR__ . '/../..' . '/models/Model.php',
        'Participants' => __DIR__ . '/../..' . '/models/Participants.php',
        'ParticipantsManager' => __DIR__ . '/../..' . '/models/ParticipantsManager.php',
        'Runs' => __DIR__ . '/../..' . '/models/Runs.php',
        'RunsManager' => __DIR__ . '/../..' . '/models/RunsManager.php',
        'Trials' => __DIR__ . '/../..' . '/models/Trials.php',
        'TrialsManager' => __DIR__ . '/../..' . '/models/TrialsManager.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit146b3efcdf7f83008004ad68b802a312::$classMap;

        }, null, ClassLoader::class);
    }
}