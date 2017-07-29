<?php
namespace Devlife\Api\Controllers\User\Feed\Item;

use Devlife\Abstracts\BaseController;

class FeedItemListController extends BaseController
{
    /**
     * @path /
     */
    public function get()
    {
    }

    /**
     * @path /:item-id
     */
    public function groupItem()
    {
        return FeedItemController::class;
    }
}