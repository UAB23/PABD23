<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524133328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sub_basim_form ADD basim_form_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sub_basim_form ADD CONSTRAINT FK_105F43997BAED122 FOREIGN KEY (basim_form_id) REFERENCES basim_form (id)');
        $this->addSql('CREATE INDEX IDX_105F43997BAED122 ON sub_basim_form (basim_form_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sub_basim_form DROP FOREIGN KEY FK_105F43997BAED122');
        $this->addSql('DROP INDEX IDX_105F43997BAED122 ON sub_basim_form');
        $this->addSql('ALTER TABLE sub_basim_form DROP basim_form_id');
    }
}
