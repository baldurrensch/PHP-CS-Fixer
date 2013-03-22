<?php

/*
 * This file is part of the PHP CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS\Tests\Fixer;

use Symfony\CS\Fixer\LowercaseKeywordFixer as Fixer;

class LowercaseKeywordFixerTest extends \PHPUnit_Framework_TestCase
{
    public function testChangeKeyword()
    {
    	$fixer = new Fixer();
    	$input = 'foreach ($foo AS $bar)';
    	$expected = 'foreach ($foo as $bar)';

    	$result = $fixer->fix($this->getFileMock(), $input);
    	$this->assertEquals($expected, $result);
    }

    public function testDontChangeKeywordWithoutSpace()
    {
    	$fixer = new Fixer();
    	$input = 'BRAND';
    	$expected = $input;

    	$result = $fixer->fix($this->getFileMock(), $input);

    	$this->assertEquals($expected, $result);
    }

    public function testCommentsAreFalsePositives()
    {
    	$fixer = new Fixer();
    	$input = '/** And the problem is bla AND foo OR bar';
    	$expected = strtolower($input);

    	$result = $fixer->fix($this->getFileMock(), $input);

    	$this->assertEquals($expected, $result);
    }

    private function getFileMock()
    {
        return $this->getMockBuilder('\SplFileInfo')
            ->disableOriginalConstructor()
            ->getMock();
    }
}