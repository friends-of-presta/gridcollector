<?php

namespace FOP\GridCollector\Grid;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

final class GridDataCollector extends DataCollector
{
    /**
     * @var Reporter the Grid data reporter.
     */
    private $reporter;

    public function __construct(Reporter $reporter)
    {
        $this->reporter = $reporter;
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, Exception $exception = null)
    {
        $this->data = [
            'grids' => $this->reporter->generateReport(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fop.grids_collector';
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->data = [];
    }

    public function getGrids()
    {
        return $this->data['grids'];
    }
}
