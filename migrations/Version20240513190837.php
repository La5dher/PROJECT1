<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240513190837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD nom_entreprise VARCHAR(255) NOT NULL, CHANGE categorie categorie VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant DROP prenom');
        $this->addSql('ALTER TABLE user ADD prenom VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP nom_entreprise, CHANGE categorie categorie LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE etudiant ADD prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE `user` DROP prenom, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE email email LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }
}
