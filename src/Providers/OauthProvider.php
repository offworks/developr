<?php
namespace Devlife\Providers;

use Devlife\Services\OauthRepository;
use Devlife\Services\OauthServer;
use Devlife\Services\OauthUserRepository;
use Exedra\Application;
use Exedra\Contracts\Provider\Provider;
use League\OAuth2\Server\Grant\PasswordGrant;

class OauthProvider implements Provider
{
    public function register(Application $app)
    {
        $app->add('repo.oauth', function() {
            return new OauthRepository();
        });

        $self = $this;

        $app->add('@oauth.server', function(\Devlife\Application $app) use($self) {
            $keysPath = $app->path['keys'];

            $oauthRepository = $app->get('repo.oauth');

            $server = new OauthServer($oauthRepository, $keysPath->to('pri.key'), $keysPath->to('pub.key'));

            $self->setUpGrants($server, $app);

            return $server;
        });
    }

    protected function setUpGrants(OauthServer $server, \Devlife\Application $app)
    {
        $server->enableGrantType(new PasswordGrant(new OauthUserRepository(), $app->get('repo.oauth')));
    }
}