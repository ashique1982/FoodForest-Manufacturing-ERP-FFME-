<?php

declare(strict_types=1);

namespace FoodForestERP\Contracts;

/**
 * Defines a service provider.
 *
 * @package FoodForestERP
 * @since 0.4.2
 */
interface ServiceProviderInterface extends Bootable
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void;
}