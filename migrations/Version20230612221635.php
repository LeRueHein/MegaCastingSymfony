<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230612221635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
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
        $this->addSql('ALTER TABLE Client ALTER COLUMN Login NVARCHAR(255)');
        $this->addSql('ALTER TABLE Client ALTER COLUMN Password NVARCHAR(255)');
        $this->addSql('ALTER TABLE OffreCasting ALTER COLUMN IdentifiantClient INT');
        $this->addSql('ALTER TABLE OffreCasting ALTER COLUMN IdentifiantTypeContrat INT');
        $this->addSql('ALTER TABLE PartenaireDiffusion ALTER COLUMN Login NVARCHAR(255)');
        $this->addSql('ALTER TABLE PartenaireDiffusion ALTER COLUMN Password NVARCHAR(255)');
    }
}
