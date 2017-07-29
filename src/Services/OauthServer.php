<?php
namespace Devlife\Services;

use League\OAuth2\Server\AuthorizationServer;

class OauthServer extends AuthorizationServer
{
    public function __construct(OauthRepository $oauthRepository, $pri, $pub)
    {
        parent::__construct($oauthRepository, $oauthRepository, $oauthRepository, $pri, $pub);

        $this->setUpGrants();
    }
}