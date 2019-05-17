<?php

namespace FOP\GridCollector\Grid;

use PrestaShop\PrestaShop\Core\Grid\Definition\GridDefinition;
use PrestaShop\PrestaShop\Core\Grid\GridInterface;

final class Reporter
{
    /**
     * @var array the list of rendered grid
     */
    private $grids = [];

    public function add(GridInterface $presentedGrid)
    {
        $this->grids[] = $presentedGrid;
    }

    public function generateReport()
    {
        $report = [];
        /** @var GridInterface $grid */
        foreach ($this->grids as $grid) {
            /** @var GridDefinition $definition */
            $definition = $grid->getDefinition();
            $report[$definition->getId()] = [
                'name' => $definition->getName(),
                'columns' => $definition->getColumns(),
                'data' => $grid->getData(),
            ];
        }

        return $report;
    }
}
