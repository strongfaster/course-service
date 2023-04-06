<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230404223137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Added tag table.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, preview_image VARCHAR(2048) NOT NULL, image VARCHAR(2048) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX idx_course_title (title), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_course (tag_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_FFDF2695BAD26311 (tag_id), INDEX IDX_FFDF2695591CC992 (course_id), PRIMARY KEY(tag_id, course_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tag_course ADD CONSTRAINT FK_FFDF2695BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_course ADD CONSTRAINT FK_FFDF2695591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE tag_course DROP FOREIGN KEY FK_FFDF2695BAD26311');
        $this->addSql('ALTER TABLE tag_course DROP FOREIGN KEY FK_FFDF2695591CC992');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_course');
    }
}
