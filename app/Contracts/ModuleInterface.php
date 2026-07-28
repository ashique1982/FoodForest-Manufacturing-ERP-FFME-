<?php

declare(strict_types=1);

namespace FoodForestERP\Contracts;

/**
 * Defines an ERP module.
 *
 * @package FoodForestERP
 * @since 0.4.2
 */
interface ModuleInterface extends Bootable
{
    /**
     * Get module name.
     *
     * @return string
     */
    public function name(): string;

    /**
     * Get module version.
     *
     * @return string
     */
    public function version(): string;
}