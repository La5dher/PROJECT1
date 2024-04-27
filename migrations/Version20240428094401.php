<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240428094401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certificat ADD id_etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE certificat ADD CONSTRAINT FK_27448F77C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_27448F77C5F87C54 ON certificat (id_etudiant_id)');
        $this->addSql('ALTER TABLE experience ADD id_etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_590C103C5F87C54 ON experience (id_etudiant_id)');
        $this->addSql('ALTER TABLE stage ADD id_entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93691A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C93691A867E8F ON stage (id_entreprise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certificat DROP FOREIGN KEY FK_27448F77C5F87C54');
        $this->addSql('DROP INDEX IDX_27448F77C5F87C54 ON certificat');
        $this->addSql('ALTER TABLE certificat DROP id_etudiant_id');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103C5F87C54');
        $this->addSql('DROP INDEX IDX_590C103C5F87C54 ON experience');
        $this->addSql('ALTER TABLE experience DROP id_etudiant_id');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93691A867E8F');
        $this->addSql('DROP INDEX IDX_C27C93691A867E8F ON stage');
        $this->addSql('ALTER TABLE stage DROP id_entreprise_id');
    }
}
