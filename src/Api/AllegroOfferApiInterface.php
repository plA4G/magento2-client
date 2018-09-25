<?php
/**
 * Created by PhpStorm.
 * User: michal
 * Date: 25.09.18
 * Time: 12:03
 */

namespace Eoko\Magento2\Client\Api;

use Eoko\Magento2\Client\Api\Operation\CreatableResourceInterface;
use Eoko\Magento2\Client\Api\Operation\DeletableResourceInterface;
use Eoko\Magento2\Client\Api\Operation\GettableResourceInterface;
use Eoko\Magento2\Client\Api\Operation\ListableResourceInterface;
use Eoko\Magento2\Client\Api\Operation\UpdateblaInterface;

interface AllegroOfferApiInterface extends ListableResourceInterface, GettableResourceInterface, CreatableResourceInterface, UpdateblaInterface, DeletableResourceInterface
{

}