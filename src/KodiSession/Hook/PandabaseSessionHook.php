<?php
/**
 * Created by PhpStorm.
 * User: nagyatka
 * Date: 2017. 09. 16.
 * Time: 15:18
 */

namespace KodiSession\Hook;


use KodiSession\Handler\PandabaseSessionHandler;
use KodiCore\Core\KodiConf;
use KodiCore\Hook\HookInterface;
use KodiCore\Request\Request;

class PandabaseSessionHook extends HookInterface
{

    public function process(KodiConf $kodiConf, Request $request): Request
    {
        // Gathering parameters
        $connectionName =  $this->getParameterByKey("connection_name") ?? "default";
        $options = $this->getParameterByKey("options") ?? [];

        // Set session handler
        $sessionHandler = new PandabaseSessionHandler([
            "connection_name" => $connectionName,
            "options" => $options
        ]);
        session_set_save_handler($sessionHandler);
        session_start();

        return $request;
    }
}