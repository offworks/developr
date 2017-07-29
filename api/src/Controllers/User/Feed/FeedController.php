<?php
namespace Devlife\Api\Controllers\User\Feed;

use Devlife\Abstracts\BaseController;
use Devlife\Api\Controllers\User\Feed\Item\FeedItemListController;

class FeedController extends BaseController
{
    public function get()
    {
    }

    /**
     * @path /items
     */
    public function groupItems()
    {
        return FeedItemListController::class;
    }
}