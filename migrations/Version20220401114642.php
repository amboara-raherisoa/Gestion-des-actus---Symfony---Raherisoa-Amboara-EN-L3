<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220401114642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actu (id INT AUTO_INCREMENT NOT NULL, rubrique_id INT DEFAULT NULL, redacteur_id INT DEFAULT NULL, theme VARCHAR(50) NOT NULL, titre VARCHAR(150) NOT NULL, breve_description VARCHAR(255) DEFAULT NULL, contenu LONGTEXT NOT NULL, date_publication DATE NOT NULL, INDEX IDX_837303423BD38833 (rubrique_id), INDEX IDX_83730342764D0490 (redacteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE redacteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubrique (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actu ADD CONSTRAINT FK_837303423BD38833 FOREIGN KEY (rubrique_id) REFERENCES rubrique (id)');
        $this->addSql('ALTER TABLE actu ADD CONSTRAINT FK_83730342764D0490 FOREIGN KEY (redacteur_id) REFERENCES redacteur (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actu DROP FOREIGN KEY FK_83730342764D0490');
        $this->addSql('ALTER TABLE actu DROP FOREIGN KEY FK_837303423BD38833');
        $this->addSql('DROP TABLE actu');
        $this->addSql('DROP TABLE redacteur');
        $this->addSql('DROP TABLE rubrique');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
    }
}
