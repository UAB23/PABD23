<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230618140620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basim_form (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bmaptitudine (id INT AUTO_INCREMENT NOT NULL, nume VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bmuser (id INT AUTO_INCREMENT NOT NULL, nume VARCHAR(255) NOT NULL, ocupatie VARCHAR(255) NOT NULL, anulnasterii INT NOT NULL, resedinta VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bmuser_bmaptitudine (bmuser_id INT NOT NULL, bmaptitudine_id INT NOT NULL, INDEX IDX_D05869CBE570040D (bmuser_id), INDEX IDX_D05869CB386D6D75 (bmaptitudine_id), PRIMARY KEY(bmuser_id, bmaptitudine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_db (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, image_path VARCHAR(500) NOT NULL, data_imagine VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE imagine (id INT AUTO_INCREMENT NOT NULL, nume VARCHAR(255) NOT NULL, descriere VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_basim_form (id INT AUTO_INCREMENT NOT NULL, sub_basim_form_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, data DATE NOT NULL, INDEX IDX_1FECD995B40316FC (sub_basim_form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postare_forum (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(255) NOT NULL, id_subcategorie INT NOT NULL, data DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_basim_form (id INT AUTO_INCREMENT NOT NULL, basim_form_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_105F43997BAED122 (basim_form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subcategorie_forum (id INT AUTO_INCREMENT NOT NULL, nume VARCHAR(255) NOT NULL, id_categorie INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_blog (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_db (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FBA308EDE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bmuser_bmaptitudine ADD CONSTRAINT FK_D05869CBE570040D FOREIGN KEY (bmuser_id) REFERENCES bmuser (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bmuser_bmaptitudine ADD CONSTRAINT FK_D05869CB386D6D75 FOREIGN KEY (bmaptitudine_id) REFERENCES bmaptitudine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_basim_form ADD CONSTRAINT FK_1FECD995B40316FC FOREIGN KEY (sub_basim_form_id) REFERENCES sub_basim_form (id)');
        $this->addSql('ALTER TABLE sub_basim_form ADD CONSTRAINT FK_105F43997BAED122 FOREIGN KEY (basim_form_id) REFERENCES basim_form (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bmuser_bmaptitudine DROP FOREIGN KEY FK_D05869CBE570040D');
        $this->addSql('ALTER TABLE bmuser_bmaptitudine DROP FOREIGN KEY FK_D05869CB386D6D75');
        $this->addSql('ALTER TABLE post_basim_form DROP FOREIGN KEY FK_1FECD995B40316FC');
        $this->addSql('ALTER TABLE sub_basim_form DROP FOREIGN KEY FK_105F43997BAED122');
        $this->addSql('DROP TABLE basim_form');
        $this->addSql('DROP TABLE bmaptitudine');
        $this->addSql('DROP TABLE bmuser');
        $this->addSql('DROP TABLE bmuser_bmaptitudine');
        $this->addSql('DROP TABLE images_db');
        $this->addSql('DROP TABLE imagine');
        $this->addSql('DROP TABLE post_basim_form');
        $this->addSql('DROP TABLE postare_forum');
        $this->addSql('DROP TABLE sub_basim_form');
        $this->addSql('DROP TABLE subcategorie_forum');
        $this->addSql('DROP TABLE user_blog');
        $this->addSql('DROP TABLE user_db');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
