<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230613124918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offre_casting_user (offre_casting_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY (offre_casting_id, user_id))');
        $this->addSql('CREATE INDEX IDX_291F76EAB3EC03AA ON offre_casting_user (offre_casting_id)');
        $this->addSql('CREATE INDEX IDX_291F76EAA76ED395 ON offre_casting_user (user_id)');
        $this->addSql('CREATE TABLE postuler (id INT IDENTITY NOT NULL, PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE offre_casting_user ADD CONSTRAINT FK_291F76EAB3EC03AA FOREIGN KEY (offre_casting_id) REFERENCES OffreCasting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_casting_user ADD CONSTRAINT FK_291F76EAA76ED395 FOREIGN KEY (user_id) REFERENCES [user] (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE __EFMigrationsHistory');
        $this->addSql('ALTER TABLE Client ALTER COLUMN Login NVARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE Client ALTER COLUMN Password NVARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE OffreCasting ALTER COLUMN IdentifiantClient INT NOT NULL');
        $this->addSql('ALTER TABLE OffreCasting ALTER COLUMN IdentifiantTypeContrat INT NOT NULL');
        $this->addSql('ALTER TABLE PartenaireDiffusion ALTER COLUMN Login NVARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE PartenaireDiffusion ALTER COLUMN Password NVARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('CREATE TABLE __EFMigrationsHistory (MigrationId NVARCHAR(150) COLLATE French_CI_AS NOT NULL, ProductVersion NVARCHAR(32) COLLATE French_CI_AS NOT NULL, PRIMARY KEY (MigrationId))');
        $this->addSql('ALTER TABLE offre_casting_user DROP CONSTRAINT FK_291F76EAB3EC03AA');
        $this->addSql('ALTER TABLE offre_casting_user DROP CONSTRAINT FK_291F76EAA76ED395');
        $this->addSql('DROP TABLE offre_casting_user');
        $this->addSql('DROP TABLE postuler');
        $this->addSql('ALTER TABLE Client ALTER COLUMN Login NVARCHAR(255)');
        $this->addSql('ALTER TABLE Client ALTER COLUMN Password NVARCHAR(255)');
        $this->addSql('ALTER TABLE OffreCasting ALTER COLUMN IdentifiantClient INT');
        $this->addSql('ALTER TABLE OffreCasting ALTER COLUMN IdentifiantTypeContrat INT');
        $this->addSql('ALTER TABLE PartenaireDiffusion ALTER COLUMN Login NVARCHAR(255)');
        $this->addSql('ALTER TABLE PartenaireDiffusion ALTER COLUMN Password NVARCHAR(255)');
    }
}
