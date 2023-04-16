<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230416141249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note_total ADD obstacles_id INT DEFAULT NULL, ADD cavaliers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note_total ADD CONSTRAINT FK_A73F4289F1EB64BC FOREIGN KEY (obstacles_id) REFERENCES obstacle (id)');
        $this->addSql('ALTER TABLE note_total ADD CONSTRAINT FK_A73F4289A7C7D383 FOREIGN KEY (cavaliers_id) REFERENCES cavalier (id)');
        $this->addSql('CREATE INDEX IDX_A73F4289F1EB64BC ON note_total (obstacles_id)');
        $this->addSql('CREATE INDEX IDX_A73F4289A7C7D383 ON note_total (cavaliers_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note_total DROP FOREIGN KEY FK_A73F4289F1EB64BC');
        $this->addSql('ALTER TABLE note_total DROP FOREIGN KEY FK_A73F4289A7C7D383');
        $this->addSql('DROP INDEX IDX_A73F4289F1EB64BC ON note_total');
        $this->addSql('DROP INDEX IDX_A73F4289A7C7D383 ON note_total');
        $this->addSql('ALTER TABLE note_total DROP obstacles_id, DROP cavaliers_id');
    }
}
