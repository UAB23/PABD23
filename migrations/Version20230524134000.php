<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524134000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_basim_form ADD sub_basim_form_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post_basim_form ADD CONSTRAINT FK_1FECD995B40316FC FOREIGN KEY (sub_basim_form_id) REFERENCES sub_basim_form (id)');
        $this->addSql('CREATE INDEX IDX_1FECD995B40316FC ON post_basim_form (sub_basim_form_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_basim_form DROP FOREIGN KEY FK_1FECD995B40316FC');
        $this->addSql('DROP INDEX IDX_1FECD995B40316FC ON post_basim_form');
        $this->addSql('ALTER TABLE post_basim_form DROP sub_basim_form_id');
    }
}
