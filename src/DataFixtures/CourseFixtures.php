<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class CourseFixtures extends Fixture
{
    public const TAG_NAMES = ['IT', 'Marketing', 'Finance', 'HR'];
    public const COURSE_NAMES = ['Front-end', 'Java', 'Golang', 'PHP'];

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++) {
            $tag = (new Tag())->setTitle(self::TAG_NAMES[array_rand(self::TAG_NAMES)]);
            $manager->persist($tag);
            $course = (new Course())->setTitle(self::COURSE_NAMES[array_rand(self::COURSE_NAMES)])
                ->setPreviewImage('random_image')
                ->setImage('random_image')
                ->addTag($tag);
            $manager->persist($course);
        }

        $manager->flush();
    }
}
