<?php

namespace Test\PhpPairProgrammingBudapest\Package;

use PhpPairProgrammingBudapest\Package\SlugWrapper;

class SlugWrapperTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatesSlug()
    {
        $toBeSlugged = 'ez egy cím';

        $slugify = $this->prophesize('Cocur\Slugify\SlugifyInterface');

        $slugify->slugify($toBeSlugged, '_')->willReturn('ez_egy_cim');

        $slugWrapper = new SlugWrapper($slugify->reveal());

        $slug = $slugWrapper->slugify($toBeSlugged);

        $this->assertEquals('ez_egy_cim', $slug);
    }

    public function testDoesNotChangeCase()
    {
        $toBeSlugged = 'EZ eGy CíM';

        $slugify = $this->prophesize('Cocur\Slugify\SlugifyInterface');

        $slugify->slugify($toBeSlugged, '_')->willReturn('EZ_eGy_CiM');

        $slugWrapper = new SlugWrapper($slugify->reveal());

        $slug = $slugWrapper->slugify($toBeSlugged);

        $this->assertEquals('EZ_eGy_CiM', $slug);
    }
}
