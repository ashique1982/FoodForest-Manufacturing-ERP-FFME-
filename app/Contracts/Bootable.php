<?php

declare(strict_types=1);

namespace FoodForestERP\Contracts;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Defines a bootable component.
 *
 * @package FoodForestERP
 * @since 0.4.2
 */
interface Bootable
{
    /**
     * Boot the component.
     *
     * @return void
     */
    public function boot(): void;
}