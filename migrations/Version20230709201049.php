<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230709201049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note ADD obstacle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F616DCDF FOREIGN KEY (obstacle_id) REFERENCES obstacle (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14F616DCDF ON note (obstacle_id)');
        $this->addSql('ALTER TABLE obstacle DROP FOREIGN KEY FK_CCBF5DB1FC56F556');
        $this->addSql('DROP INDEX IDX_CCBF5DB1FC56F556 ON obstacle');
        $this->addSql('ALTER TABLE obstacle DROP notes_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F616DCDF');
        $this->addSql('DROP INDEX IDX_CFBDFA14F616DCDF ON note');
        $this->addSql('ALTER TABLE note DROP obstacle_id');
        $this->addSql('ALTER TABLE obstacle ADD notes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE obstacle ADD CONSTRAINT FK_CCBF5DB1FC56F556 FOREIGN KEY (notes_id) REFERENCES note (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CCBF5DB1FC56F556 ON obstacle (notes_id)');
    }
}
