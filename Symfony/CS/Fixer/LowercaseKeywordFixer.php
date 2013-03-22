<?php

/*
 * This file is part of the PHP CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS\Fixer;

use Symfony\CS\FixerInterface;

/**
 * @author Baldur Rensch <brensch@gmail.com>
 */
class LowercaseKeywordFixer implements FixerInterface
{
    public function fix(\SplFileInfo $file, $content)
    {
        $keywords = array(
            ' abstract',
            ' and',
            ' as',
            ' break',
            ' callable',
            ' case',
            ' catch',
            ' class',
            ' clone',
            ' const',
            ' continue',
            ' declare',
            ' default',
            ' do',
            ' echo',
            ' else',
            ' elseif',
            ' enddeclare',
            ' endfor',
            ' endforeach',
            ' endif',
            ' endswitch',
            ' endwhile',
            ' extends',
            ' final',
            ' for',
            ' foreach',
            ' function',
            ' global',
            ' goto',
            ' if',
            ' implements',
            ' include',
            ' include_once',
            ' instanceof',
            ' insteadof',
            ' interface',
            ' namespace',
            ' new',
            ' or',
            ' print',
            ' private',
            ' protected',
            ' public',
            ' require',
            ' require_once',
            ' return',
            ' static',
            ' switch',
            ' throw',
            ' trait',
            ' try',
            ' use',
            ' var',
            ' while',
            ' xor',
            ' __halt_compiler\(',
            ' array\(',
            ' die\(',
            ' empty\(',
            ' eval\(',
            ' exit\(',
            ' isset\(',
            ' list\(',
            ' unset\(',
        );

        $search = array();
        foreach ($keywords as $keyword) {
            $search []= '/' . $keyword . '/i';
        }

        return preg_replace($search, $keywords, $content);
    }

    public function getLevel()
    {
        // defined in PSR2 ¶2.5
        return FixerInterface::PSR2_LEVEL;
    }

    public function getPriority()
    {
        return 0;
    }

    public function supports(\SplFileInfo $file)
    {
        return true;
    }

    public function getName()
    {
        return 'keyword';
    }

    public function getDescription()
    {
        return 'PHP keywords MUST be in lower case.';
    }
}
