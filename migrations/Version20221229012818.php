<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221229012818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agencia (id INT AUTO_INCREMENT NOT NULL, numero_agencia VARCHAR(15) NOT NULL, nome VARCHAR(50) NOT NULL, endereco VARCHAR(255) NOT NULL, telefone INT DEFAULT NULL, gerente VARCHAR(50) NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, senha VARCHAR(15) NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conta (id INT AUTO_INCREMENT NOT NULL, cliente VARCHAR(50) NOT NULL, agencia VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerente (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, senha VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE perfil (id INT AUTO_INCREMENT NOT NULL, tipo VARCHAR(50) NOT NULL, status VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agencia');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE conta');
        $this->addSql('DROP TABLE gerente');
        $this->addSql('DROP TABLE perfil');
    }
}
