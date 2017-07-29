<?php
namespace Devlife\Console\Commands;

use Devlife\Application;
use Devlife\Entities\Challenge;
use Devlife\Entities\ChallengeBody;
use Devlife\Entities\Feed\Feed;
use Devlife\Entities\Feed\Item;
use Devlife\Entities\Oauth\AccessToken;
use Devlife\Entities\Oauth\Client;
use Devlife\Entities\Oauth\RefreshToken;
use Devlife\Entities\Post\Post;
use Devlife\Entities\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateCommand extends Command
{
    protected $app;

    public function __construct(Application $application)
    {
        $this->app = $application;

        parent::__construct('model:migrate');
    }

    public function configure()
    {
        $this->setDescription('Migrate db');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $spot = $this->app->spot;

        $spot->mapper(User::class)->migrate();
        $spot->mapper(User\Experience::class)->migrate();
        $spot->mapper(Challenge::class)->migrate();
        $spot->mapper(ChallengeBody::class)->migrate();
        $spot->mapper(AccessToken::class)->migrate();
        $spot->mapper(Client::class)->migrate();
        $spot->mapper(RefreshToken::class)->migrate();
        $spot->mapper(Feed::class)->migrate();
        $spot->mapper(Item::class)->migrate();
        $spot->mapper(Post::class)->migrate();
    }
}