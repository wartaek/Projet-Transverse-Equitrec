<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230416141039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE obstacle DROP FOREIGN KEY FK_CCBF5DB1FC8CE522');
        $this->addSql('DROP INDEX IDX_CCBF5DB1FC8CE522 ON obstacle');
        $this->addSql('ALTER TABLE obstacle DROP note_total_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE obstacle ADD note_total_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE obstacle ADD CONSTRAINT FK_CCBF5DB1FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CCBF5DB1FC8CE522 ON obstacle (note_total_id)');
    }
}
