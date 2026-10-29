-- Demo data for Donart. Every account's password is demo1234.
-- Dates are relative to NOW() so the demo always looks recent.
SET NAMES utf8mb4;

INSERT INTO users (userid,type,group_type,first_name,last_name,gender,email,password,url_address,tag_name,profile_image,cover_image,about,owner,date) VALUES
(1001,'profile','','Maya','Johnson','Female','demo@donart.app','$2y$10$/Eg8PuGA5yvt2/DKD.hRvOlpgKW0PEPfrI9oX7Nlka5XZKAmayyV.','maya.johnson','mayajohnson','uploads/demo/selfie.jpg','uploads/demo/mountain.jpg','Weekend volunteer and community organiser. I coordinate food drives in my neighbourhood and love connecting donors with people who need a hand.',0,NOW() - INTERVAL 129600 MINUTE),
(1002,'profile','','Daniel','Carter','Male','daniel@donart.app','$2y$10$/Eg8PuGA5yvt2/DKD.hRvOlpgKW0PEPfrI9oX7Nlka5XZKAmayyV.','daniel.carter','danielcarter','uploads/demo/user1.jpg','uploads/demo/cover_image.jpg','Director at Clean Water Initiative. 12 years in the non-profit sector.',0,NOW() - INTERVAL 128160 MINUTE),
(1003,'profile','','Samuel','Okafor','Male','samuel@donart.app','$2y$10$/Eg8PuGA5yvt2/DKD.hRvOlpgKW0PEPfrI9oX7Nlka5XZKAmayyV.','samuel.okafor','samuelokafor','uploads/demo/user2.jpg','uploads/demo/cf3.jpg','Teacher by day, tutor for underprivileged kids by evening.',0,NOW() - INTERVAL 126720 MINUTE),
(1004,'profile','','Grace','Williams','Female','grace@donart.app','$2y$10$/Eg8PuGA5yvt2/DKD.hRvOlpgKW0PEPfrI9oX7Nlka5XZKAmayyV.','grace.williams','gracewilliams','uploads/demo/user3.jpg','uploads/demo/xyz.jpg','Running the Food Bank Helpers group. Every can counts!',0,NOW() - INTERVAL 125280 MINUTE),
(1005,'profile','','Marcus','Reed','Male','marcus@donart.app','$2y$10$/Eg8PuGA5yvt2/DKD.hRvOlpgKW0PEPfrI9oX7Nlka5XZKAmayyV.','marcus.reed','marcusreed','uploads/demo/user4.jpg','uploads/demo/cf1.jpg','Looking for help after the floods last month, and paying it forward where I can.',0,NOW() - INTERVAL 123840 MINUTE),
(2001,'group','public','Clean Green Volunteers','','','','','clean.green.volunteers','','uploads/demo/cf3.jpg','uploads/demo/cf3.jpg','Monthly park and river clean-ups. Bring gloves, we bring the bags.',1003,NOW() - INTERVAL 86400 MINUTE),
(2002,'group','public','Food Bank Helpers','','','','','food.bank.helpers','','uploads/demo/cf4.jpg','uploads/demo/cf4.jpg','Sorting, packing and delivering food parcels every Saturday.',1004,NOW() - INTERVAL 86400 MINUTE),
(2003,'group','private','Teach for Tomorrow','','','','','teach.for.tomorrow','','uploads/demo/cf5.jpg','uploads/demo/cf5.jpg','Volunteer tutors helping kids catch up on reading and maths.',1002,NOW() - INTERVAL 86400 MINUTE);

INSERT INTO posts (postid,userid,owner,parent,post,image,has_image,tags,likes,comments,date) VALUES
(5007,1002,0,0,'Reminder: tax receipts for this year\'s donations go out next week. Reach out if you need a copy for your records.','',0,'[]',1,0,NOW() - INTERVAL 7200 MINUTE),
(5006,1001,0,0,'Huge thanks to everyone who showed up for the community meetup. Teamwork really does make the dream work.','uploads/demo/abc.jpg',1,'[]',4,0,NOW() - INTERVAL 4500 MINUTE),
(5104,1002,2003,0,'Welcome to all our new tutors. Lesson plans are pinned in the group files.','',0,'[]',0,0,NOW() - INTERVAL 3600 MINUTE),
(5005,1003,0,0,'Tutoring session went great tonight. Little Amara read a whole page on her own for the first time!','uploads/demo/cf5.jpg',1,'[]',2,1,NOW() - INTERVAL 3000 MINUTE),
(6008,1004,0,5005,'Moments like these are why we do it!','',0,'[]',0,0,NOW() - INTERVAL 2880 MINUTE),
(5103,1004,2002,0,'Thank you volunteers! Here\'s our wonderful team from last weekend.','uploads/demo/xyz.jpg',1,'[]',2,0,NOW() - INTERVAL 1800 MINUTE),
(5004,1005,0,0,'Our street was badly hit by the floods. We need blankets, children\'s clothes and bottled water. Any help is appreciated and I can share drop-off details by message.','',0,'[]',4,3,NOW() - INTERVAL 1680 MINUTE),
(6005,1001,0,5004,'Marcus, I have blankets and kids\' clothes ready. Will drop them off tomorrow.','',0,'[]',1,0,NOW() - INTERVAL 1560 MINUTE),
(6006,1002,0,5004,'Our team can bring a pallet of bottled water on Thursday.','',0,'[]',0,0,NOW() - INTERVAL 1440 MINUTE),
(6007,1005,0,5004,'Thank you both, this means so much to our street.','',0,'[]',0,0,NOW() - INTERVAL 1320 MINUTE),
(5003,1004,0,0,'Our Saturday crew packed 230 food parcels this week. We still need volunteers for Sunday deliveries, message me if you have a car and a free morning.','uploads/demo/cf4.jpg',1,'[]',2,1,NOW() - INTERVAL 1200 MINUTE),
(6004,1001,0,5003,'I can do Sunday deliveries, sending you a message now.','',0,'[]',0,0,NOW() - INTERVAL 1080 MINUTE),
(5101,1003,2001,0,'Next clean-up: Riverside park, Sunday 9am. We\'ll meet by the boathouse.','uploads/demo/cf3.jpg',1,'[]',2,0,NOW() - INTERVAL 600 MINUTE),
(5102,1001,2001,0,'Count me in! Bringing two friends along.','',0,'[]',0,0,NOW() - INTERVAL 540 MINUTE),
(5002,1001,0,0,'Be the reason someone smiles today.','uploads/demo/cf2.jpg',1,'[]',3,1,NOW() - INTERVAL 360 MINUTE),
(6003,1003,0,5002,'Love this one','',0,'[]',0,0,NOW() - INTERVAL 300 MINUTE),
(5001,1002,0,0,'We just finished installing two new water pumps in the village. 400 families now have clean water within a 5 minute walk. Thank you to every single donor who made this possible!','uploads/demo/cf1.jpg',1,'[]',4,2,NOW() - INTERVAL 180 MINUTE),
(6001,1001,0,5001,'This is amazing work, Daniel. Proud to have chipped in!','',0,'[]',1,0,NOW() - INTERVAL 150 MINUTE),
(6002,1004,0,5001,'Incredible. Sharing this with our group.','',0,'[]',0,0,NOW() - INTERVAL 120 MINUTE);

INSERT INTO likes (type,contentid,likes,following) VALUES
('post',5001,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}, {"userid": "1005", "date": "2026-09-01 10:00:00"}]',NULL),
('post',5002,'[{"userid": "1002", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}]',NULL),
('post',5003,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1002", "date": "2026-09-01 10:00:00"}]',NULL),
('post',5004,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1002", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}]',NULL),
('post',5005,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}]',NULL),
('post',5006,'[{"userid": "1002", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}, {"userid": "1005", "date": "2026-09-01 10:00:00"}]',NULL),
('post',5007,'[{"userid": "1004", "date": "2026-09-01 10:00:00"}]',NULL),
('post',5101,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}]',NULL),
('post',5103,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}]',NULL),
('post',6001,'[{"userid": "1002", "date": "2026-09-01 10:00:00"}]',NULL),
('post',6005,'[{"userid": "1005", "date": "2026-09-01 10:00:00"}]',NULL),
('user',1001,'[{"userid": "1002", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}, {"userid": "1005", "date": "2026-09-01 10:00:00"}]','[{"userid": "1002", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}, {"userid": "1005", "date": "2026-09-01 10:00:00"}]'),
('user',1002,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}, {"userid": "1005", "date": "2026-09-01 10:00:00"}]','[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}]'),
('user',1003,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1002", "date": "2026-09-01 10:00:00"}]','[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1002", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}]'),
('user',1004,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1003", "date": "2026-09-01 10:00:00"}, {"userid": "1005", "date": "2026-09-01 10:00:00"}]','[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1002", "date": "2026-09-01 10:00:00"}]'),
('user',1005,'[{"userid": "1001", "date": "2026-09-01 10:00:00"}]','[{"userid": "1001", "date": "2026-09-01 10:00:00"}, {"userid": "1002", "date": "2026-09-01 10:00:00"}, {"userid": "1004", "date": "2026-09-01 10:00:00"}]');

UPDATE users SET likes = CASE userid WHEN 1002 THEN 4 WHEN 1003 THEN 2 WHEN 1004 THEN 3 WHEN 1005 THEN 1 WHEN 1001 THEN 4 ELSE likes END;

UPDATE users SET online = CASE userid WHEN 1002 THEN UNIX_TIMESTAMP() - 1500 WHEN 1003 THEN UNIX_TIMESTAMP() - 7200 WHEN 1004 THEN UNIX_TIMESTAMP() - 300 WHEN 1005 THEN UNIX_TIMESTAMP() - 86400 ELSE online END;

INSERT INTO group_members (groupid,userid,role,date) VALUES
(2001,1001,'member',NOW() - INTERVAL 43200 MINUTE),
(2001,1004,'member',NOW() - INTERVAL 43200 MINUTE),
(2001,1005,'member',NOW() - INTERVAL 43200 MINUTE),
(2002,1001,'moderator',NOW() - INTERVAL 43200 MINUTE),
(2002,1002,'member',NOW() - INTERVAL 43200 MINUTE),
(2003,1003,'member',NOW() - INTERVAL 43200 MINUTE);

INSERT INTO group_requests (groupid,userid,date) VALUES (2003,1005,NOW() - INTERVAL 300 MINUTE);
INSERT INTO group_invites (groupid,userid,inviter,date) VALUES (2003,1001,1002,NOW() - INTERVAL 240 MINUTE);

INSERT INTO messages (msgid,sender,receiver,message,file,tags,seen,date) VALUES
('demothreadmayadaniel000000000000000000000000000000000000001',1002,1001,'Hi Maya! Thanks so much for supporting the water project.','','[]',1,NOW() - INTERVAL 1800 MINUTE),
('demothreadmayadaniel000000000000000000000000000000000000001',1001,1002,'Of course! Let me know if you need volunteers for the next site.','','[]',1,NOW() - INTERVAL 1740 MINUTE),
('demothreadmayamarcus000000000000000000000000000000000000003',1005,1001,'Maya, thank you for the blankets. The kids were so happy.','','[]',0,NOW() - INTERVAL 1200 MINUTE),
('demothreadmayagrace0000000000000000000000000000000000000002',1001,1004,'Hey Grace, I can help with Sunday deliveries. What time should I be there?','','[]',1,NOW() - INTERVAL 1080 MINUTE),
('demothreadmayagrace0000000000000000000000000000000000000002',1004,1001,'Amazing, thank you! 8:30 at the community hall. Bring your car keys :)','','[]',1,NOW() - INTERVAL 1020 MINUTE),
('demothreadmayadaniel000000000000000000000000000000000000001',1002,1001,'Will do. We\'re planning a visit in December, would love to have you along.','','[]',0,NOW() - INTERVAL 120 MINUTE);

INSERT INTO notifications (userid,activity,content_owner,contentid,content_type,date) VALUES
(1003,'like',1001,5002,'post',NOW() - INTERVAL 330 MINUTE),
(1003,'comment',1001,5002,'post',NOW() - INTERVAL 300 MINUTE),
(1002,'like',1001,5006,'post',NOW() - INTERVAL 4200 MINUTE),
(1005,'follow',1001,1001,'profile',NOW() - INTERVAL 2400 MINUTE),
(1005,'like',1001,6005,'comment',NOW() - INTERVAL 1260 MINUTE),
(1002,'like',1001,6001,'comment',NOW() - INTERVAL 132 MINUTE);

INSERT INTO content_i_follow (userid,contentid,content_type,date) VALUES
(1001,5001,'comment',NOW() - INTERVAL 600 MINUTE),
(1001,5003,'comment',NOW() - INTERVAL 600 MINUTE),
(1001,5004,'comment',NOW() - INTERVAL 600 MINUTE);
