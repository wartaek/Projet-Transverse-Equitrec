<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314152347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_epreuve (categorie_id INT NOT NULL, epreuve_id INT NOT NULL, INDEX IDX_892E4ADDBCF5E72D (categorie_id), INDEX IDX_892E4ADDAB990336 (epreuve_id), PRIMARY KEY(categorie_id, epreuve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cavalier (id INT AUTO_INCREMENT NOT NULL, note_total_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, license INT NOT NULL, dossard VARCHAR(50) NOT NULL, INDEX IDX_FFD9B8A7FC8CE522 (note_total_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, date DATE NOT NULL, ville VARCHAR(50) NOT NULL, cp VARCHAR(6) NOT NULL, adresse VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition_cavalier (competition_id INT NOT NULL, cavalier_id INT NOT NULL, INDEX IDX_CEA883887B39D312 (competition_id), INDEX IDX_CEA883886965C0EA (cavalier_id), PRIMARY KEY(competition_id, cavalier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, commentaire VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_competition (epreuve_id INT NOT NULL, competition_id INT NOT NULL, INDEX IDX_113EE93DAB990336 (epreuve_id), INDEX IDX_113EE93D7B39D312 (competition_id), PRIMARY KEY(epreuve_id, competition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, cavalier_id INT DEFAULT NULL, nom VARCHAR(20) NOT NULL, INDEX IDX_4BDFF36B6965C0EA (cavalier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note_total (id INT AUTO_INCREMENT NOT NULL, note DOUBLE PRECISION DEFAULT NULL, observation VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE obstacle (id INT AUTO_INCREMENT NOT NULL, note_total_id INT DEFAULT NULL, nom VARCHAR(20) NOT NULL, INDEX IDX_CCBF5DB1FC8CE522 (note_total_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parametrer (id INT AUTO_INCREMENT NOT NULL, hauteur VARCHAR(50) NOT NULL, largeur VARCHAR(50) DEFAULT NULL, temps_max VARCHAR(50) DEFAULT NULL, pente VARCHAR(50) DEFAULT NULL, front VARCHAR(50) DEFAULT NULL, informations VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parametrer_epreuve (parametrer_id INT NOT NULL, epreuve_id INT NOT NULL, INDEX IDX_7E96F6B3FC1282CB (parametrer_id), INDEX IDX_7E96F6B3AB990336 (epreuve_id), PRIMARY KEY(parametrer_id, epreuve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parametrer_niveau (parametrer_id INT NOT NULL, niveau_id INT NOT NULL, INDEX IDX_17126AC6FC1282CB (parametrer_id), INDEX IDX_17126AC6B3E9C81 (niveau_id), PRIMARY KEY(parametrer_id, niveau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parametrer_obstacle (parametrer_id INT NOT NULL, obstacle_id INT NOT NULL, INDEX IDX_5EC5E838FC1282CB (parametrer_id), INDEX IDX_5EC5E838F616DCDF (obstacle_id), PRIMARY KEY(parametrer_id, obstacle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE penalite (id INT AUTO_INCREMENT NOT NULL, libelle_penalite VARCHAR(50) NOT NULL, description VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE penalite_note_total (penalite_id INT NOT NULL, note_total_id INT NOT NULL, INDEX IDX_4410E019D0CCF327 (penalite_id), INDEX IDX_4410E019FC8CE522 (note_total_id), PRIMARY KEY(penalite_id, note_total_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, val INT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posseder_note_total (posseder_id INT NOT NULL, note_total_id INT NOT NULL, INDEX IDX_E264181C1DB77787 (posseder_id), INDEX IDX_E264181CFC8CE522 (note_total_id), PRIMARY KEY(posseder_id, note_total_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posseder_type_note (posseder_id INT NOT NULL, type_note_id INT NOT NULL, INDEX IDX_9CB4DF311DB77787 (posseder_id), INDEX IDX_9CB4DF31ECC67A0 (type_note_id), PRIMARY KEY(posseder_id, type_note_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_note (id INT AUTO_INCREMENT NOT NULL, libelle_type_note VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, note_total_id INT DEFAULT NULL, competition_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, last_login DATETIME NOT NULL, register_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649FC8CE522 (note_total_id), INDEX IDX_8D93D6497B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_epreuve ADD CONSTRAINT FK_892E4ADDBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_epreuve ADD CONSTRAINT FK_892E4ADDAB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cavalier ADD CONSTRAINT FK_FFD9B8A7FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id)');
        $this->addSql('ALTER TABLE competition_cavalier ADD CONSTRAINT FK_CEA883887B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition_cavalier ADD CONSTRAINT FK_CEA883886965C0EA FOREIGN KEY (cavalier_id) REFERENCES cavalier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_competition ADD CONSTRAINT FK_113EE93DAB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_competition ADD CONSTRAINT FK_113EE93D7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE niveau ADD CONSTRAINT FK_4BDFF36B6965C0EA FOREIGN KEY (cavalier_id) REFERENCES cavalier (id)');
        $this->addSql('ALTER TABLE obstacle ADD CONSTRAINT FK_CCBF5DB1FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id)');
        $this->addSql('ALTER TABLE parametrer_epreuve ADD CONSTRAINT FK_7E96F6B3FC1282CB FOREIGN KEY (parametrer_id) REFERENCES parametrer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parametrer_epreuve ADD CONSTRAINT FK_7E96F6B3AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parametrer_niveau ADD CONSTRAINT FK_17126AC6FC1282CB FOREIGN KEY (parametrer_id) REFERENCES parametrer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parametrer_niveau ADD CONSTRAINT FK_17126AC6B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parametrer_obstacle ADD CONSTRAINT FK_5EC5E838FC1282CB FOREIGN KEY (parametrer_id) REFERENCES parametrer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parametrer_obstacle ADD CONSTRAINT FK_5EC5E838F616DCDF FOREIGN KEY (obstacle_id) REFERENCES obstacle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE penalite_note_total ADD CONSTRAINT FK_4410E019D0CCF327 FOREIGN KEY (penalite_id) REFERENCES penalite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE penalite_note_total ADD CONSTRAINT FK_4410E019FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posseder_note_total ADD CONSTRAINT FK_E264181C1DB77787 FOREIGN KEY (posseder_id) REFERENCES posseder (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posseder_note_total ADD CONSTRAINT FK_E264181CFC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posseder_type_note ADD CONSTRAINT FK_9CB4DF311DB77787 FOREIGN KEY (posseder_id) REFERENCES posseder (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posseder_type_note ADD CONSTRAINT FK_9CB4DF31ECC67A0 FOREIGN KEY (type_note_id) REFERENCES type_note (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_epreuve DROP FOREIGN KEY FK_892E4ADDBCF5E72D');
        $this->addSql('ALTER TABLE categorie_epreuve DROP FOREIGN KEY FK_892E4ADDAB990336');
        $this->addSql('ALTER TABLE cavalier DROP FOREIGN KEY FK_FFD9B8A7FC8CE522');
        $this->addSql('ALTER TABLE competition_cavalier DROP FOREIGN KEY FK_CEA883887B39D312');
        $this->addSql('ALTER TABLE competition_cavalier DROP FOREIGN KEY FK_CEA883886965C0EA');
        $this->addSql('ALTER TABLE epreuve_competition DROP FOREIGN KEY FK_113EE93DAB990336');
        $this->addSql('ALTER TABLE epreuve_competition DROP FOREIGN KEY FK_113EE93D7B39D312');
        $this->addSql('ALTER TABLE niveau DROP FOREIGN KEY FK_4BDFF36B6965C0EA');
        $this->addSql('ALTER TABLE obstacle DROP FOREIGN KEY FK_CCBF5DB1FC8CE522');
        $this->addSql('ALTER TABLE parametrer_epreuve DROP FOREIGN KEY FK_7E96F6B3FC1282CB');
        $this->addSql('ALTER TABLE parametrer_epreuve DROP FOREIGN KEY FK_7E96F6B3AB990336');
        $this->addSql('ALTER TABLE parametrer_niveau DROP FOREIGN KEY FK_17126AC6FC1282CB');
        $this->addSql('ALTER TABLE parametrer_niveau DROP FOREIGN KEY FK_17126AC6B3E9C81');
        $this->addSql('ALTER TABLE parametrer_obstacle DROP FOREIGN KEY FK_5EC5E838FC1282CB');
        $this->addSql('ALTER TABLE parametrer_obstacle DROP FOREIGN KEY FK_5EC5E838F616DCDF');
        $this->addSql('ALTER TABLE penalite_note_total DROP FOREIGN KEY FK_4410E019D0CCF327');
        $this->addSql('ALTER TABLE penalite_note_total DROP FOREIGN KEY FK_4410E019FC8CE522');
        $this->addSql('ALTER TABLE posseder_note_total DROP FOREIGN KEY FK_E264181C1DB77787');
        $this->addSql('ALTER TABLE posseder_note_total DROP FOREIGN KEY FK_E264181CFC8CE522');
        $this->addSql('ALTER TABLE posseder_type_note DROP FOREIGN KEY FK_9CB4DF311DB77787');
        $this->addSql('ALTER TABLE posseder_type_note DROP FOREIGN KEY FK_9CB4DF31ECC67A0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FC8CE522');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497B39D312');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_epreuve');
        $this->addSql('DROP TABLE cavalier');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE competition_cavalier');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE epreuve_competition');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE note_total');
        $this->addSql('DROP TABLE obstacle');
        $this->addSql('DROP TABLE parametrer');
        $this->addSql('DROP TABLE parametrer_epreuve');
        $this->addSql('DROP TABLE parametrer_niveau');
        $this->addSql('DROP TABLE parametrer_obstacle');
        $this->addSql('DROP TABLE penalite');
        $this->addSql('DROP TABLE penalite_note_total');
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP TABLE posseder_note_total');
        $this->addSql('DROP TABLE posseder_type_note');
        $this->addSql('DROP TABLE type_note');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
