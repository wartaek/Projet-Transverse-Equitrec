<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230609100625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note ADD penalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14D0CCF327 FOREIGN KEY (penalite_id) REFERENCES penalite (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14D0CCF327 ON note (penalite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14D0CCF327');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14D0CCF327 ON note');
        $this->addSql('ALTER TABLE note DROP penalite_id');
    }
}
