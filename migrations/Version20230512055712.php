<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512055712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories_forum_db (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, datetime VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_forum_db1 (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, timp DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_forum_db1 (id INT AUTO_INCREMENT NOT NULL, id_subcateg INT NOT NULL, id_user INT NOT NULL, text VARCHAR(5000) DEFAULT NULL, timp DATETIME NOT NULL, approved INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subcategories_forum_db1 (id INT AUTO_INCREMENT NOT NULL, id_categ INT NOT NULL, name VARCHAR(255) NOT NULL, timp DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categories_forum_db');
        $this->addSql('DROP TABLE categories_forum_db1');
        $this->addSql('DROP TABLE post_forum_db1');
        $this->addSql('DROP TABLE subcategories_forum_db1');
    }
}
