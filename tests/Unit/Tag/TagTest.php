<?php declare(strict_types=1);

namespace App\Tests\Unit\Tag;

use App\Entity\Tag;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

final class TagTest extends TestCase
{
    public function testTagName()
    {
        $tag = new Tag();
        $title = "Tag name";

        $tag->setTitle($title);

        $this->assertEquals($title, $tag->getTitle());
    }

    public function testUpdatedAt()
    {
        $tag = new Tag();
        $dateTime = new DateTimeImmutable();

        $tag->setUpdatedAt($dateTime);

        $this->assertEquals($dateTime, $tag->getUpdatedAt());
    }
}
