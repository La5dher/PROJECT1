<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240511161844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE certificat (id INT NOT NULL, domaine LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', niveau VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE certificat ADD CONSTRAINT FK_27448F77BF396750 FOREIGN KEY (id) REFERENCES realisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103BF396750 FOREIGN KEY (id) REFERENCES realisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realisation ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certificat DROP FOREIGN KEY FK_27448F77BF396750');
        $this->addSql('DROP TABLE certificat');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103BF396750');
        $this->addSql('ALTER TABLE experience CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE realisation DROP type');
    }
}
