CREATE TABLE IF NOT EXISTS TB_USERS (
USER_ID int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
SESSION_ID varchar(48) DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
USER_NAME varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
USER_PASSWORD_HASH varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
USER_EMAIL varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
USER_ACTIVE tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
USER_DELETED tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
USER_ACCOUNT_TYPE tinyint(1) NOT NULL DEFAULT '1' COMMENT 'user''s account type (basic, premium, etc)',
USER_REMEMBER_ME_TOKEN varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
USER_CREATION_TIMESTAMP bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
USER_SUSPENSION_TIMESTAMP bigint(20) DEFAULT NULL COMMENT 'Timestamp till the end of a user suspension',
USER_LAST_LOGIN_TIMESTAMP bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
USER_FAILED_LOGINS tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
USER_LAST_FAILED_LOGIN int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
USER_ACTIVATION_HASH varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
USER_PASSWORD_RESET_HASH char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
USER_PASSWORD_RESET_TIMESTAMP bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
PRIMARY KEY (USER_ID),
UNIQUE KEY USER_EMAIL (USER_EMAIL)
);

INSERT INTO TB_USERS (SESSION_ID, USER_NAME, USER_PASSWORD_HASH, USER_EMAIL, USER_ACTIVE, 
USER_DELETED, USER_ACCOUNT_TYPE, USER_REMEMBER_ME_TOKEN, USER_CREATION_TIMESTAMP, 
USER_SUSPENSION_TIMESTAMP, USER_LAST_LOGIN_TIMESTAMP, USER_FAILED_LOGINS, USER_LAST_FAILED_LOGIN, 
USER_ACTIVATION_HASH, USER_PASSWORD_RESET_HASH, USER_PASSWORD_RESET_TIMESTAMP)
VALUES (NULL, 'admin', '$2y$10$94MlEulehfKpw05iFXOTkOTdesuYpGB4vmCpTPF0i77IcYX8LjA4e', 
'jestupinanc@gmail.com', 1, 0, 1, NULL, CURDATE(), NULL, CURDATE(), 0, NULL, NULL, NULL, NULL);