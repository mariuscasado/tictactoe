<?php

namespace Tests\Unit;


use DeBandai\Grid;
use DeBandai\Cell;

class GridTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function grid_is_empty_when_no_cell_filled()
    {
        $grid = new Grid();
        $this->assertTrue($grid->isEmpty());
    }

    /**
     * @test
     */
    public function grid_not_empty_after_filling_one_cell()
    {
        $grid = new Grid();

        $row = 0;
        $column = 0;

        $cell = $grid->getCell($row, $column)->setValue(Cell::O);

        $this->assertFalse($grid->isEmpty());
    }





    // ======================== Helpers =========================
}