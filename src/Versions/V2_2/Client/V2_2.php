<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Client;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;

class V2_2 extends AbstractFeatures
{
    private Credentials $credentials;

    private Locations $locations;

    private Tokens $tokens;

    private Cdrs $cdrs;

    private Versions $versions;

    private Commands $commands;

    private Sessions $sessions;

    private Tariffs $tariffs;

    public function credentials(): Credentials
    {
        if (!isset($this->credentials)) {
            $this->credentials = new Credentials($this->ocpiConfiguration);
        }

        return $this->credentials;
    }

    public function locations(): Locations
    {
        if (!isset($this->locations)) {
            $this->locations = new Locations($this->ocpiConfiguration);
        }

        return $this->locations;
    }

    public function tokens(): Tokens
    {
        if (!isset($this->tokens)) {
            $this->tokens = new Tokens($this->ocpiConfiguration);
        }

        return $this->tokens;
    }

    public function cdrs(): Cdrs
    {
        if (!isset($this->cdrs)) {
            $this->cdrs = new Cdrs($this->ocpiConfiguration);
        }

        return $this->cdrs;
    }

    public function versions(): Versions
    {
        if(!isset($this->versions)) {
            $this->versions = new Versions($this->ocpiConfiguration);
        }

        return $this->versions;
    }

    public function commands(): Commands
    {
        if(!isset($this->commands)) {
            $this->commands = new Commands($this->ocpiConfiguration);
        }

        return $this->commands;
    }

    public function sessions(): Sessions
    {
        if(!isset($this->sessions)) {
            $this->sessions = new Sessions($this->ocpiConfiguration);
        }

        return $this->sessions;
    }

    public function tariffs(): Tariffs
    {
        if(!isset($this->tariffs)) {
            $this->tariffs = new Tariffs($this->ocpiConfiguration);
        }

        return $this->tariffs;
    }
}
