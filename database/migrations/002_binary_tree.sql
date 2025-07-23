-- users table already exists from 001
ALTER TABLE users
ADD username VARCHAR(50) UNIQUE AFTER full_name,
ADD sponsor_id INT NULL AFTER username,
ADD left_leg_id INT NULL,
ADD right_leg_id INT NULL,
ADD placement ENUM('left', 'right') NULL,
ADD path VARCHAR(255) NULL,
ADD INDEX idx_sponsor (sponsor_id),
ADD INDEX idx_left (left_leg_id),
ADD INDEX idx_right (right_leg_id),
ADD CONSTRAINT fk_sponsor FOREIGN KEY (sponsor_id) REFERENCES users (id) ON DELETE SET NULL;