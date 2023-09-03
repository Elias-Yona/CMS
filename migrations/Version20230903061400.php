<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230903061400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE customer_detail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE driver_detail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE shop_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE shop_staff_assignment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sim_activation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sim_card_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sim_status_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE simcard_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE staff_detail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE staff_earning_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE track_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE van_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vehicle_driver_assignment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vehicle_staff_assignment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE customer_detail (id INT NOT NULL, user_account_id INT NOT NULL, date_of_birth DATE NOT NULL, gender VARCHAR(30) NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9FC3A3C23C0C9956 ON customer_detail (user_account_id)');
        $this->addSql('COMMENT ON COLUMN customer_detail.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE driver_detail (id INT NOT NULL, user_account_id INT NOT NULL, date_of_birth DATE NOT NULL, gender VARCHAR(30) NOT NULL, phone_number VARCHAR(20) NOT NULL, address TEXT NOT NULL, license_number VARCHAR(30) NOT NULL, license_expiry_date DATE NOT NULL, license_class VARCHAR(255) NOT NULL, profile_picture VARCHAR(255) DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6B59A12B3C0C9956 ON driver_detail (user_account_id)');
        $this->addSql('COMMENT ON COLUMN driver_detail.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE shop (id INT NOT NULL, name VARCHAR(255) NOT NULL, address TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE shop_staff_assignment (id INT NOT NULL, staff_detail_id INT DEFAULT NULL, shop_id INT DEFAULT NULL, assignment_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, assignment_duration INT NOT NULL, is_transferred BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F7CA53DAE99CD3F4 ON shop_staff_assignment (staff_detail_id)');
        $this->addSql('CREATE INDEX IDX_F7CA53DA4D16C4DD ON shop_staff_assignment (shop_id)');
        $this->addSql('COMMENT ON COLUMN shop_staff_assignment.assignment_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE sim_activation (id INT NOT NULL, staff_detail_id INT DEFAULT NULL, sim_card_id INT DEFAULT NULL, activation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, top_up_amount DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6C8A73EAE99CD3F4 ON sim_activation (staff_detail_id)');
        $this->addSql('CREATE INDEX IDX_6C8A73EAD73F6863 ON sim_activation (sim_card_id)');
        $this->addSql('COMMENT ON COLUMN sim_activation.activation_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE sim_card (id INT NOT NULL, simcard_type_id INT DEFAULT NULL, phone_number VARCHAR(255) NOT NULL, serial_number VARCHAR(255) NOT NULL, personal_unblocking_key_code VARCHAR(255) NOT NULL, personal_identification_number_code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_60AA437D4225B9F1 ON sim_card (simcard_type_id)');
        $this->addSql('CREATE TABLE sim_status (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE simcard_type (id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE staff_detail (id INT NOT NULL, user_account_id INT NOT NULL, date_of_birth DATE NOT NULL, gender VARCHAR(30) NOT NULL, phone_number VARCHAR(20) NOT NULL, address TEXT NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, profile_picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B7BCD283C0C9956 ON staff_detail (user_account_id)');
        $this->addSql('COMMENT ON COLUMN staff_detail.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE staff_earning (id INT NOT NULL, staff_detail_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, date_of_payment TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_ECB90697E99CD3F4 ON staff_earning (staff_detail_id)');
        $this->addSql('COMMENT ON COLUMN staff_earning.date_of_payment IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE track (id INT NOT NULL, sim_activation_id INT DEFAULT NULL, previous_status_id INT DEFAULT NULL, new_status_id INT DEFAULT NULL, status_change_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, reason_for_change VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D6E3F8A6CB4BD021 ON track (sim_activation_id)');
        $this->addSql('CREATE INDEX IDX_D6E3F8A66C852FBC ON track (previous_status_id)');
        $this->addSql('CREATE INDEX IDX_D6E3F8A6596805D2 ON track (new_status_id)');
        $this->addSql('COMMENT ON COLUMN track.status_change_time IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, id_number VARCHAR(8) NOT NULL, email VARCHAR(255) NOT NULL, role VARCHAR(30) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status VARCHAR(30) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE van (id INT NOT NULL, number_plate VARCHAR(255) NOT NULL, working_area TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE vehicle_driver_assignment (id INT NOT NULL, van_id INT DEFAULT NULL, driver_detail_id INT DEFAULT NULL, assignment_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, assignment_duration INT NOT NULL, is_transferred BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_44394DF98A128D90 ON vehicle_driver_assignment (van_id)');
        $this->addSql('CREATE INDEX IDX_44394DF9F7F208A2 ON vehicle_driver_assignment (driver_detail_id)');
        $this->addSql('COMMENT ON COLUMN vehicle_driver_assignment.assignment_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE vehicle_staff_assignment (id INT NOT NULL, staff_detail_id INT DEFAULT NULL, van_id INT DEFAULT NULL, assignment_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, assignment_duration INT NOT NULL, is_transferred BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B46E86F1E99CD3F4 ON vehicle_staff_assignment (staff_detail_id)');
        $this->addSql('CREATE INDEX IDX_B46E86F18A128D90 ON vehicle_staff_assignment (van_id)');
        $this->addSql('COMMENT ON COLUMN vehicle_staff_assignment.assignment_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE customer_detail ADD CONSTRAINT FK_9FC3A3C23C0C9956 FOREIGN KEY (user_account_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE driver_detail ADD CONSTRAINT FK_6B59A12B3C0C9956 FOREIGN KEY (user_account_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE shop_staff_assignment ADD CONSTRAINT FK_F7CA53DAE99CD3F4 FOREIGN KEY (staff_detail_id) REFERENCES staff_detail (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE shop_staff_assignment ADD CONSTRAINT FK_F7CA53DA4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sim_activation ADD CONSTRAINT FK_6C8A73EAE99CD3F4 FOREIGN KEY (staff_detail_id) REFERENCES staff_detail (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sim_activation ADD CONSTRAINT FK_6C8A73EAD73F6863 FOREIGN KEY (sim_card_id) REFERENCES sim_card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sim_card ADD CONSTRAINT FK_60AA437D4225B9F1 FOREIGN KEY (simcard_type_id) REFERENCES simcard_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE staff_detail ADD CONSTRAINT FK_2B7BCD283C0C9956 FOREIGN KEY (user_account_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE staff_earning ADD CONSTRAINT FK_ECB90697E99CD3F4 FOREIGN KEY (staff_detail_id) REFERENCES staff_detail (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A6CB4BD021 FOREIGN KEY (sim_activation_id) REFERENCES sim_activation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A66C852FBC FOREIGN KEY (previous_status_id) REFERENCES sim_status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A6596805D2 FOREIGN KEY (new_status_id) REFERENCES sim_status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vehicle_driver_assignment ADD CONSTRAINT FK_44394DF98A128D90 FOREIGN KEY (van_id) REFERENCES van (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vehicle_driver_assignment ADD CONSTRAINT FK_44394DF9F7F208A2 FOREIGN KEY (driver_detail_id) REFERENCES driver_detail (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vehicle_staff_assignment ADD CONSTRAINT FK_B46E86F1E99CD3F4 FOREIGN KEY (staff_detail_id) REFERENCES staff_detail (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vehicle_staff_assignment ADD CONSTRAINT FK_B46E86F18A128D90 FOREIGN KEY (van_id) REFERENCES van (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE customer_detail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE driver_detail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE shop_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE shop_staff_assignment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sim_activation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sim_card_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sim_status_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE simcard_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE staff_detail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE staff_earning_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE track_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE van_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vehicle_driver_assignment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vehicle_staff_assignment_id_seq CASCADE');
        $this->addSql('ALTER TABLE customer_detail DROP CONSTRAINT FK_9FC3A3C23C0C9956');
        $this->addSql('ALTER TABLE driver_detail DROP CONSTRAINT FK_6B59A12B3C0C9956');
        $this->addSql('ALTER TABLE shop_staff_assignment DROP CONSTRAINT FK_F7CA53DAE99CD3F4');
        $this->addSql('ALTER TABLE shop_staff_assignment DROP CONSTRAINT FK_F7CA53DA4D16C4DD');
        $this->addSql('ALTER TABLE sim_activation DROP CONSTRAINT FK_6C8A73EAE99CD3F4');
        $this->addSql('ALTER TABLE sim_activation DROP CONSTRAINT FK_6C8A73EAD73F6863');
        $this->addSql('ALTER TABLE sim_card DROP CONSTRAINT FK_60AA437D4225B9F1');
        $this->addSql('ALTER TABLE staff_detail DROP CONSTRAINT FK_2B7BCD283C0C9956');
        $this->addSql('ALTER TABLE staff_earning DROP CONSTRAINT FK_ECB90697E99CD3F4');
        $this->addSql('ALTER TABLE track DROP CONSTRAINT FK_D6E3F8A6CB4BD021');
        $this->addSql('ALTER TABLE track DROP CONSTRAINT FK_D6E3F8A66C852FBC');
        $this->addSql('ALTER TABLE track DROP CONSTRAINT FK_D6E3F8A6596805D2');
        $this->addSql('ALTER TABLE vehicle_driver_assignment DROP CONSTRAINT FK_44394DF98A128D90');
        $this->addSql('ALTER TABLE vehicle_driver_assignment DROP CONSTRAINT FK_44394DF9F7F208A2');
        $this->addSql('ALTER TABLE vehicle_staff_assignment DROP CONSTRAINT FK_B46E86F1E99CD3F4');
        $this->addSql('ALTER TABLE vehicle_staff_assignment DROP CONSTRAINT FK_B46E86F18A128D90');
        $this->addSql('DROP TABLE customer_detail');
        $this->addSql('DROP TABLE driver_detail');
        $this->addSql('DROP TABLE shop');
        $this->addSql('DROP TABLE shop_staff_assignment');
        $this->addSql('DROP TABLE sim_activation');
        $this->addSql('DROP TABLE sim_card');
        $this->addSql('DROP TABLE sim_status');
        $this->addSql('DROP TABLE simcard_type');
        $this->addSql('DROP TABLE staff_detail');
        $this->addSql('DROP TABLE staff_earning');
        $this->addSql('DROP TABLE track');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE van');
        $this->addSql('DROP TABLE vehicle_driver_assignment');
        $this->addSql('DROP TABLE vehicle_staff_assignment');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
