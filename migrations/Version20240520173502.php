<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240520173502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE certificat (id INT NOT NULL, domaine VARCHAR(255) DEFAULT NULL, niveau VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT NOT NULL, categorie VARCHAR(255) DEFAULT NULL, nom_entreprise VARCHAR(255) NOT NULL, date_de_creation DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT NOT NULL, nce INT NOT NULL, niveau VARCHAR(255) NOT NULL, institut VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT NOT NULL, duree DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisation (id INT AUTO_INCREMENT NOT NULL, id_etudiant_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, place VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_EAA5610EC5F87C54 (id_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, id_entreprise_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_C27C93691A867E8F (id_entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_etudiant (stage_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_7999E68E2298D193 (stage_id), INDEX IDX_7999E68EDDEAB1A3 (etudiant_id), PRIMARY KEY(stage_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, reseaux_sociaux VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, fixe VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_LOGIN (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE certificat ADD CONSTRAINT FK_27448F77BF396750 FOREIGN KEY (id) REFERENCES realisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103BF396750 FOREIGN KEY (id) REFERENCES realisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610EC5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93691A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE stage_etudiant ADD CONSTRAINT FK_7999E68E2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_etudiant ADD CONSTRAINT FK_7999E68EDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certificat DROP FOREIGN KEY FK_27448F77BF396750');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60BF396750');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3BF396750');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103BF396750');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610EC5F87C54');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93691A867E8F');
        $this->addSql('ALTER TABLE stage_etudiant DROP FOREIGN KEY FK_7999E68E2298D193');
        $this->addSql('ALTER TABLE stage_etudiant DROP FOREIGN KEY FK_7999E68EDDEAB1A3');
        $this->addSql('DROP TABLE certificat');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE realisation');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE stage_etudiant');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
