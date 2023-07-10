<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230709201841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP INDEX UNIQ_CFBDFA14D0CCF327, ADD INDEX IDX_CFBDFA14D0CCF327 (penalite_id)');
        $this->addSql('ALTER TABLE note DROP INDEX UNIQ_CFBDFA146965C0EA, ADD INDEX IDX_CFBDFA146965C0EA (cavalier_id)');
        $this->addSql('ALTER TABLE note DROP INDEX UNIQ_CFBDFA14B3E9C81, ADD INDEX IDX_CFBDFA14B3E9C81 (niveau_id)');
        $this->addSql('ALTER TABLE note DROP INDEX UNIQ_CFBDFA14BACD6074, ADD INDEX IDX_CFBDFA14BACD6074 (style_id)');
        $this->addSql('ALTER TABLE note DROP INDEX UNIQ_CFBDFA141823061F, ADD INDEX IDX_CFBDFA141823061F (contrat_id)');
        $this->addSql('ALTER TABLE note DROP INDEX UNIQ_CFBDFA142B4626E2, ADD INDEX IDX_CFBDFA142B4626E2 (allure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP INDEX IDX_CFBDFA146965C0EA, ADD UNIQUE INDEX UNIQ_CFBDFA146965C0EA (cavalier_id)');
        $this->addSql('ALTER TABLE note DROP INDEX IDX_CFBDFA14B3E9C81, ADD UNIQUE INDEX UNIQ_CFBDFA14B3E9C81 (niveau_id)');
        $this->addSql('ALTER TABLE note DROP INDEX IDX_CFBDFA14BACD6074, ADD UNIQUE INDEX UNIQ_CFBDFA14BACD6074 (style_id)');
        $this->addSql('ALTER TABLE note DROP INDEX IDX_CFBDFA141823061F, ADD UNIQUE INDEX UNIQ_CFBDFA141823061F (contrat_id)');
        $this->addSql('ALTER TABLE note DROP INDEX IDX_CFBDFA142B4626E2, ADD UNIQUE INDEX UNIQ_CFBDFA142B4626E2 (allure_id)');
        $this->addSql('ALTER TABLE note DROP INDEX IDX_CFBDFA14D0CCF327, ADD UNIQUE INDEX UNIQ_CFBDFA14D0CCF327 (penalite_id)');
    }
}
