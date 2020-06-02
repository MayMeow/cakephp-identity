<?php

namespace CakephpIdentity\Factories;

use Cake\Http\ServerRequest;

class ActionFactory
{
    /**
     * Method getActionString()
     *
     * Returns string definition of action which is using by Identity plugin to identity
     * whether user has permission or not to given action
     *
     * @param ServerRequest $request
     * @return string
     */
    public static function getActionString(ServerRequest $request) : string
    {
        $actionString = '';

        // check if plugin is available
        if ($request->getParam('plugin')) {
            $actionString = $actionString . $request->getParam('plugin') .":/";
        } else {
            $actionString = $actionString . '__:/';
        }

        // check if prefix is available
        if ($request->getParam('prefix')) {
            $actionString = $actionString . $request->getParam('prefix') ."/";
        }

        // action and controller is defined every time
        $actionString = $actionString . $request->getParam('controller') ."/";
        $actionString = $actionString . $request->getParam('action');

        return $actionString;
    }
}
