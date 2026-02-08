<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260208001207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(255) NOT NULL, points INT NOT NULL, trait VARCHAR(100) NOT NULL, question_id INT NOT NULL, INDEX IDX_DADD4A251E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, lettre_motivation LONGTEXT NOT NULL, statut VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, etudiant_id INT NOT NULL, offre_id INT NOT NULL, cv_id INT NOT NULL, INDEX IDX_E33BD3B8DDEAB1A3 (etudiant_id), INDEX IDX_E33BD3B84CC8505A (offre_id), INDEX IDX_E33BD3B8CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, fichier VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_B66FFE92DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE etudiant (niveau VARCHAR(50) DEFAULT NULL, filiere_id INT DEFAULT NULL, id INT NOT NULL, INDEX IDX_717E22E3180AA129 (filiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, categorie VARCHAR(100) NOT NULL, traits JSON DEFAULT NULL, debouches LONGTEXT DEFAULT NULL, competences LONGTEXT DEFAULT NULL, niveau VARCHAR(50) DEFAULT NULL, icon VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE lecon (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, contenu LONGTEXT DEFAULT NULL, fichier VARCHAR(255) DEFAULT NULL, duree INT DEFAULT NULL, created_at DATETIME NOT NULL, matiere_id INT NOT NULL, prof_id INT NOT NULL, INDEX IDX_94E6242EF46CD258 (matiere_id), INDEX IDX_94E6242EABC1F7FE (prof_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, filiere_id INT DEFAULT NULL, prof_id INT DEFAULT NULL, INDEX IDX_9014574A180AA129 (filiere_id), INDEX IDX_9014574AABC1F7FE (prof_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(50) NOT NULL, lieu VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, admin_id INT DEFAULT NULL, INDEX IDX_AF86866F642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE plan (id INT AUTO_INCREMENT NOT NULL, objectif VARCHAR(255) NOT NULL, duree VARCHAR(255) DEFAULT NULL, niveau_cible VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL, prof_id INT DEFAULT NULL, filiere_id INT DEFAULT NULL, INDEX IDX_DD5A5B7DABC1F7FE (prof_id), INDEX IDX_DD5A5B7D180AA129 (filiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE prof (specialite VARCHAR(100) DEFAULT NULL, id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(255) NOT NULL, category VARCHAR(100) NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE quiz_result (id INT AUTO_INCREMENT NOT NULL, responses JSON NOT NULL, scores JSON NOT NULL, recommendations JSON NOT NULL, profile_type VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, etudiant_id INT DEFAULT NULL, INDEX IDX_FE2E314ADDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, note DOUBLE PRECISION NOT NULL, date_evaluation DATE DEFAULT NULL, etudiant_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_32993751DDEAB1A3 (etudiant_id), INDEX IDX_32993751F46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT DEFAULT NULL, date_test DATE DEFAULT NULL, duree INT DEFAULT NULL, created_at DATETIME NOT NULL, prof_id INT NOT NULL, matiere_id INT DEFAULT NULL, INDEX IDX_D87F7E0CABC1F7FE (prof_id), INDEX IDX_D87F7E0CF46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE test_result (id INT AUTO_INCREMENT NOT NULL, note DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, etudiant_id INT NOT NULL, test_id INT NOT NULL, INDEX IDX_84B3C63DDDEAB1A3 (etudiant_id), INDEX IDX_84B3C63D1E5D0459 (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, cin VARCHAR(20) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B84CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE92DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lecon ADD CONSTRAINT FK_94E6242EF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE lecon ADD CONSTRAINT FK_94E6242EABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574AABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7DABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id)');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
        $this->addSql('ALTER TABLE prof ADD CONSTRAINT FK_5BBA70BBBF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_result ADD CONSTRAINT FK_FE2E314ADDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0CABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE test_result ADD CONSTRAINT FK_84B3C63DDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE test_result ADD CONSTRAINT FK_84B3C63D1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8DDEAB1A3');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B84CC8505A');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8CFE419E2');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE92DDEAB1A3');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3180AA129');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3BF396750');
        $this->addSql('ALTER TABLE lecon DROP FOREIGN KEY FK_94E6242EF46CD258');
        $this->addSql('ALTER TABLE lecon DROP FOREIGN KEY FK_94E6242EABC1F7FE');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A180AA129');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574AABC1F7FE');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F642B8210');
        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7DABC1F7FE');
        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D180AA129');
        $this->addSql('ALTER TABLE prof DROP FOREIGN KEY FK_5BBA70BBBF396750');
        $this->addSql('ALTER TABLE quiz_result DROP FOREIGN KEY FK_FE2E314ADDEAB1A3');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751DDEAB1A3');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751F46CD258');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0CABC1F7FE');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0CF46CD258');
        $this->addSql('ALTER TABLE test_result DROP FOREIGN KEY FK_84B3C63DDDEAB1A3');
        $this->addSql('ALTER TABLE test_result DROP FOREIGN KEY FK_84B3C63D1E5D0459');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE lecon');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE plan');
        $this->addSql('DROP TABLE prof');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE quiz_result');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE test_result');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
