<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308123829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Civilite (Identifiant INT IDENTITY NOT NULL, LibelShort NVARCHAR(255) NOT NULL, LibelLong NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Client (Identifiant INT IDENTITY NOT NULL, Nom NVARCHAR(255) NOT NULL, Ville NVARCHAR(255) NOT NULL, Telephone INT NOT NULL, Email NVARCHAR(255) NOT NULL, Login NVARCHAR(255) NOT NULL, Password NVARCHAR(255) NOT NULL, OffreCastings NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Conseil (Identifiant INT IDENTITY NOT NULL, Libel NVARCHAR(255) NOT NULL, Contenu NVARCHAR(3000) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE DomaineMetier (Identifiant INT IDENTITY NOT NULL, Libel NVARCHAR(255) NOT NULL, Description NVARCHAR(3000) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Interview (Identifiant INT IDENTITY NOT NULL, Libel NVARCHAR(255) NOT NULL, Url NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Metier (Identifiant INT IDENTITY NOT NULL, Libel NVARCHAR(255) NOT NULL, Description NVARCHAR(3000) NOT NULL, IdentifiantDomaineMetier INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_560C08BAE52D612A ON Metier (IdentifiantDomaineMetier)');
        $this->addSql('CREATE TABLE OffreCasting (Identifiant INT IDENTITY NOT NULL, Libel NVARCHAR(255) NOT NULL, Reference NVARCHAR(3000) NOT NULL, ParutionDateTime DATETIME2(6) NOT NULL, OffreDateStart DATETIME2(6) NOT NULL, OffreDateEnd DATETIME2(6) NOT NULL, Localisation NVARCHAR(255) NOT NULL, IdentifiantClient INT NOT NULL, IdentifiantTypeContrat INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_982EDF9C93C1B089 ON OffreCasting (IdentifiantClient)');
        $this->addSql('CREATE INDEX IDX_982EDF9C9251261A ON OffreCasting (IdentifiantTypeContrat)');
        $this->addSql('CREATE TABLE CiviliteOffreCasting (IdentifiantCivilite INT NOT NULL, IdentifiantOffreCasting INT NOT NULL, PRIMARY KEY (IdentifiantCivilite, IdentifiantOffreCasting))');
        $this->addSql('CREATE INDEX IDX_5CC7CA8DCDCDB2D5 ON CiviliteOffreCasting (IdentifiantCivilite)');
        $this->addSql('CREATE INDEX IDX_5CC7CA8DB196B681 ON CiviliteOffreCasting (IdentifiantOffreCasting)');
        $this->addSql('CREATE TABLE MetierOffreCasting (IdentifiantMetier INT NOT NULL, IdentifiantOffreCasting INT NOT NULL, PRIMARY KEY (IdentifiantMetier, IdentifiantOffreCasting))');
        $this->addSql('CREATE INDEX IDX_A740572E525B950 ON MetierOffreCasting (IdentifiantMetier)');
        $this->addSql('CREATE INDEX IDX_A740572EB196B681 ON MetierOffreCasting (IdentifiantOffreCasting)');
        $this->addSql('CREATE TABLE Pack (Identifiant INT IDENTITY NOT NULL, Libel NVARCHAR(255) NOT NULL, NombreOffre INT NOT NULL, Tarif INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE PartenaireDiffusion (Identifiant INT IDENTITY NOT NULL, Login NVARCHAR(255) NOT NULL, Password NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE TypeContrat (Identifiant INT IDENTITY NOT NULL, Libel NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('ALTER TABLE Metier ADD CONSTRAINT FK_560C08BAE52D612A FOREIGN KEY (IdentifiantDomaineMetier) REFERENCES DomaineMetier (Identifiant)');
        $this->addSql('ALTER TABLE OffreCasting ADD CONSTRAINT FK_982EDF9C93C1B089 FOREIGN KEY (IdentifiantClient) REFERENCES Client (Identifiant)');
        $this->addSql('ALTER TABLE OffreCasting ADD CONSTRAINT FK_982EDF9C9251261A FOREIGN KEY (IdentifiantTypeContrat) REFERENCES TypeContrat (Identifiant)');
        $this->addSql('ALTER TABLE CiviliteOffreCasting ADD CONSTRAINT FK_5CC7CA8DCDCDB2D5 FOREIGN KEY (IdentifiantCivilite) REFERENCES OffreCasting (Identifiant)');
        $this->addSql('ALTER TABLE CiviliteOffreCasting ADD CONSTRAINT FK_5CC7CA8DB196B681 FOREIGN KEY (IdentifiantOffreCasting) REFERENCES Civilite (Identifiant)');
        $this->addSql('ALTER TABLE MetierOffreCasting ADD CONSTRAINT FK_A740572E525B950 FOREIGN KEY (IdentifiantMetier) REFERENCES OffreCasting (Identifiant)');
        $this->addSql('ALTER TABLE MetierOffreCasting ADD CONSTRAINT FK_A740572EB196B681 FOREIGN KEY (IdentifiantOffreCasting) REFERENCES Metier (Identifiant)');
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
        $this->addSql('ALTER TABLE Metier DROP CONSTRAINT FK_560C08BAE52D612A');
        $this->addSql('ALTER TABLE OffreCasting DROP CONSTRAINT FK_982EDF9C93C1B089');
        $this->addSql('ALTER TABLE OffreCasting DROP CONSTRAINT FK_982EDF9C9251261A');
        $this->addSql('ALTER TABLE CiviliteOffreCasting DROP CONSTRAINT FK_5CC7CA8DCDCDB2D5');
        $this->addSql('ALTER TABLE CiviliteOffreCasting DROP CONSTRAINT FK_5CC7CA8DB196B681');
        $this->addSql('ALTER TABLE MetierOffreCasting DROP CONSTRAINT FK_A740572E525B950');
        $this->addSql('ALTER TABLE MetierOffreCasting DROP CONSTRAINT FK_A740572EB196B681');
        $this->addSql('DROP TABLE Civilite');
        $this->addSql('DROP TABLE Client');
        $this->addSql('DROP TABLE Conseil');
        $this->addSql('DROP TABLE DomaineMetier');
        $this->addSql('DROP TABLE Interview');
        $this->addSql('DROP TABLE Metier');
        $this->addSql('DROP TABLE OffreCasting');
        $this->addSql('DROP TABLE CiviliteOffreCasting');
        $this->addSql('DROP TABLE MetierOffreCasting');
        $this->addSql('DROP TABLE Pack');
        $this->addSql('DROP TABLE PartenaireDiffusion');
        $this->addSql('DROP TABLE TypeContrat');
    }
}
