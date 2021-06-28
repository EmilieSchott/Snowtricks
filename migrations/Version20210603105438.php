<?php

declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210603105438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add roles to user table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, CHANGE username username VARCHAR(180) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user DROP roles, CHANGE username username VARCHAR(45) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
    }
}
