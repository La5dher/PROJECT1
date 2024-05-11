<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240511160038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, id_entreprise_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_C27C93691A867E8F (id_entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_etudiant (stage_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_7999E68E2298D193 (stage_id), INDEX IDX_7999E68EDDEAB1A3 (etudiant_id), PRIMARY KEY(stage_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93691A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE stage_etudiant ADD CONSTRAINT FK_7999E68E2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_etudiant ADD CONSTRAINT FK_7999E68EDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93691A867E8F');
        $this->addSql('ALTER TABLE stage_etudiant DROP FOREIGN KEY FK_7999E68E2298D193');
        $this->addSql('ALTER TABLE stage_etudiant DROP FOREIGN KEY FK_7999E68EDDEAB1A3');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE stage_etudiant');
    }
}
