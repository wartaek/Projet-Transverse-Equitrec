<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230709171822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cavalier DROP FOREIGN KEY FK_FFD9B8A7FC8CE522');
        $this->addSql('DROP INDEX IDX_FFD9B8A7FC8CE522 ON cavalier');
        $this->addSql('ALTER TABLE cavalier DROP note_total_id');
        $this->addSql('ALTER TABLE penalite ADD val_penalite INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cavalier ADD note_total_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cavalier ADD CONSTRAINT FK_FFD9B8A7FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FFD9B8A7FC8CE522 ON cavalier (note_total_id)');
        $this->addSql('ALTER TABLE penalite DROP val_penalite');
    }
}
