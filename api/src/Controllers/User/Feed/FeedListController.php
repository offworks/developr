<?php
namespace Devlife\Api\Controllers\User\Feed;

use Devlife\Abstracts\BaseController;

class FeedListController extends BaseController
{
    public function get()
    {
    }

    /**
     * @path /:feed-id
     */
    public function groupFeed()
    {
        return FeedController::class;
    }
}