<?php
namespace Tests\Unit;

use DeBandai\Grid;
use DeBandai\Cell;

class CellTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function given_a_cell_after_place_them_at_the_board_the_value_is_still_correct()
    {
        $grid = new Grid();

        $row = 0;
        $column = 0;
        $value = Cell::O;

        $expectedCell = Cell::init($row, $column, $value);

        $cell = $grid->getCell($row, $column)->setValue($value);

        $this->assertEquals($expectedCell,$cell);

        $this->assertTrue($cell->isCellType($value));
    }

    /**
     * @test
     */
    public function given_a_grid_try_to_get_a_cell_out_of_the_bounds()
    {
        $grid = new Grid();

        $row = 10;
        $column = 10;

        $cell = $grid->getCell($row,$column);

        $this->assertNull($cell);
    }

    /** @test */
    public function ensure_cannot_change_a_cell_value_in_an_already_filled_cell()
    {
    	$grid = new Grid();

        $row = 2;
        $column = 2;
        $first_value = Cell::X;

        $expectedCell = Cell::init($row, $column, $first_value);

        $cell = $grid->getCell($row, $column)->setValue($first_value);

        $second_value = Cell::O;
        $cell->setValue($second_value);

        $this->assertEquals($expectedCell,$cell);

        $this->assertTrue($cell->isCellType($first_value));
    }
}