CREATE TABLE `sample` (
  `sample_id` int PRIMARY KEY,
  `species` varchar(255),
  `origin` varchar(255),
  `gene` varchar(255),
  `date_collected` date,
  `submission` varchar(255)
);

CREATE TABLE `location` (
  `location_code` varchar(255) PRIMARY KEY,
  `location_name` varchar(255),
  `GPS` decimal
);

CREATE TABLE `antibiotics` (
  `antibiotic_id` varchar(255) PRIMARY KEY,
  `antibiotic_name` varchar(255),
  `minimum_dose` varchar(255),
  `maximum_dose` varchar(255),
  `zone_size_limit` varchar(255)
);

CREATE TABLE `genes` (
  `gene_id` varchar(255) PRIMARY KEY,
  `gene_name` varchar(255),
  `gene_sequence` varchar(255),
  `source_ref` varchar(255)
);

CREATE TABLE `species` (
  `species_id` varchar(255) PRIMARY KEY,
  `species_name` varchar(255),
  `species_family` varchar(255)
);

CREATE TABLE `submission` (
  `submission_id` varchar(255) PRIMARY KEY,
  `submission_time` time,
  `submission_status` varchar(255),
  `publication` varchar(255)
);

CREATE TABLE `user` (
  `user_id` int PRIMARY KEY,
  `user_class` char,
  `user_password` varchar(255),
  `user_fullname` varchar(255),
  `user_email` varchar(255),
  `registration_date` date
);

CREATE TABLE `user_request` (
  `request_id` varchar(255) PRIMARY KEY,
  `request_status` char,
  `request_date` date
);

CREATE TABLE `test` (
  `test_id` int PRIMARY KEY,
  `dose` varchar(255),
  `result_reference` varchar(255)
);

CREATE TABLE `results` (
  `result_id` int PRIMARY KEY,
  `diameter` float,
  `image` longblob,
  `resistancy` varchar(255)
);

ALTER TABLE `location` ADD FOREIGN KEY (`location_code`) REFERENCES `sample` (`origin`);

ALTER TABLE `genes` ADD FOREIGN KEY (`gene_id`) REFERENCES `sample` (`gene`);

ALTER TABLE `test` ADD FOREIGN KEY (`test_id`) REFERENCES `sample` (`sample_id`);

ALTER TABLE `test` ADD FOREIGN KEY (`test_id`) REFERENCES `antibiotics` (`antibiotic_id`);

ALTER TABLE `test` ADD FOREIGN KEY (`test_id`) REFERENCES `results` (`result_id`);

ALTER TABLE `submission` ADD FOREIGN KEY (`submission_id`) REFERENCES `sample` (`submission`);

ALTER TABLE `submission` ADD FOREIGN KEY (`submission_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `submission` ADD FOREIGN KEY (`submission_id`) REFERENCES `user_request` (`request_id`);

ALTER TABLE `user_request` ADD FOREIGN KEY (`request_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `sample` ADD FOREIGN KEY (`species`) REFERENCES `species` (`species_id`);
