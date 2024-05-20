<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240520070330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE reseaux_sociaux reseaux_sociaux VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL, CHANGE fixe fixe VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` CHANGE reseaux_sociaux reseaux_sociaux LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE telephone telephone LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE fixe fixe LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }
}
