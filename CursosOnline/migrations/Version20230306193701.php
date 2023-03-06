<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306193701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE curso (id INT AUTO_INCREMENT NOT NULL, usuario_i_id INT NOT NULL, nombre VARCHAR(150) NOT NULL, INDEX IDX_CA3B40EC971001A7 (usuario_i_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, tipo_usuario_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2265B05DE7927C74 (email), UNIQUE INDEX UNIQ_2265B05D4ABE41B6 (tipo_usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE curso ADD CONSTRAINT FK_CA3B40EC971001A7 FOREIGN KEY (usuario_i_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D4ABE41B6 FOREIGN KEY (tipo_usuario_id) REFERENCES tipo_usuario (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE curso DROP FOREIGN KEY FK_CA3B40EC971001A7');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D4ABE41B6');
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP TABLE tipo_usuario');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
