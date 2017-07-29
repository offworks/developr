<?php
namespace Devlife\Api\Controllers\User;

use Devlife\Abstracts\BaseController;
use Devlife\Api\Controllers\User\Challenge\ChallengeListController;
use Devlife\Api\Controllers\User\Feed\FeedController;
use Devlife\Api\Controllers\User\Feed\FeedItemListController;
use Devlife\Api\Controllers\User\Feed\FeedListController;
use Devlife\Context;
use Devlife\Entities\User;

class UserController extends BaseController
{
    /**
     * @path /
     */
    public function get(Context $context)
    {
        $user = $context->user;

        return $user;
    }

    /**
     * @path /challenges
     */
    public function groupChallenges()
    {
        return ChallengeListController::class;
    }

    /**
     * @path /feeds
     */
    public function groupFeeds()
    {
        return FeedListController::class;
    }
}