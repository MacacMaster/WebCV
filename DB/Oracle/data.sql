/***********************************
* DATA FOR WEBCV
* By M-A Ramsay
***********************************/

--------------------------------------
-- INITIAL INSERTS : TOKENS AND USERS
--------------------------------------

EXECUTE newToken('valide','bob@bob.com');
-- Create Owner
EXECUTE newUser('OWNER','$2y$10$PgFVWEiBPPdy6gNuRPmKye1RQ64nCMutyICcvKWQxEydVWnjqiqNS',3);
-- Create Admin
EXECUTE newUser('ADMIN','$2y$10$2cqZu2QB8kLJII7DR7Y6ouqIXwgByiE1Li/OAWUaNpzu/vfWs3wtO',2);
-- Create User
EXECUTE newUser('USER','$2y$10$u6AuvC5l9iYmN3GdKaRN7e/PTTUeXxgWPf5BLfaq5QB07dYXSH/7y',1);
-- Create Fred (Fred, I'm your father...)
EXECUTE newUser('FRED','$2y$10$nUOlWYPFgzULRCUgMpTFx.Zd7pevW45NEYLKpmu891xlx8ixSBP1K',3);

--------------------------------------
-- INITIAL INSERTS : Site Content
--------------------------------------
--en
EXECUTE addProject('DEATHSTAR','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.','img/portfolio/deathstar.jpg','AJAX','en');
EXECUTE addProject('POTATOSTAR','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.','img/portfolio/placeholder.jpg','AJAX','en');
EXECUTE addProject('BALDEAGLE','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.','img/portfolio/placeholder.jpg','AJAX','en');
EXECUTE addProject('BALDOSSAN','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.','img/portfolio/placeholder.jpg','JS,POTATOSCRIPT','en');
EXECUTE addSiteLang('FullStack Dev - Network Addict - Full-on Unicorn','An awesome guy that did this with the help of a template','He never said he was a designer!','About me','CV' ,'Read my CV!','My Projects','Contact Me','Your name','Please enter your name.','Email Address','Please enter your email address.','Message','Please enter a message.','Captcha','Please enter the captcha.','Close','en');

--fr
EXECUTE addProject('DEATHSTAR','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.','img/portfolio/deathstar.jpg','AJAX','fr');
EXECUTE addSiteLang('FullStack Dev - Network Addict - Licorne Magique','Un mec vraiment bien qui à créé ce site à l''aide d''un template','Je suis décidément pas un designer!','À propos','CV' ,'Lisez mon CV!','Mes projets','Me contacter','Votre nom','Veuillez entrer votre nom.','Addresse Email','Veuillez entrer votre adresse email.','Message','Veuillez entrer votre message.','Captcha','Veuillez entrer le captcha.','Fermer','fr');


--Contacts
EXECUTE addContact('Fred ice-T.','Fred@fred.ca','444-444-4419','Prof émérite');

EXECUTE addJob('FullTime Student','Studying at CVM','img/portfolio/placeholder.jpg','CVM','2017-2018','Fred ice-T.','en');
EXECUTE addJob('FullTime Student1','Studying at CVM','img/portfolio/placeholder.jpg','CVM','2017-2018','Fred ice-T.','en');
EXECUTE addJob('FullTime Student2','Studying at CVM','img/portfolio/placeholder.jpg','CVM','2017-2018','Fred ice-T.','en');

EXECUTE addJob('Étudiant Temps Plein','Étudier au CVM','img/portfolio/placeholder.jpg','CVM','2017-2018','Fred ice-T.','fr');