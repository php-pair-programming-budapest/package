<?php

namespace PhpPairProgrammingBudapest\Package;

use Cocur\Slugify\SlugifyInterface;

/**
 * Wrappeli a Slugify interfészét.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class SlugWrapper
{
    /**
     * @var SlugifyInterface
     */
    private $slugify;

    /**
     * @param SlugifyInterface $slugify
     */
    public function __construct(SlugifyInterface $slugify)
    {
        $this->slugify = $slugify;
    }

    /**
     * Ugyanazt csinálja, mint a slugify, csak a separatort hardcode-oltuk.
     *
     * @param string $string
     *
     * @return string
     */
    public function slugify($string)
    {
        return $this->slugify->slugify($string, '_');
    }
}
