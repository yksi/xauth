xauth
=====

Xauth app for magnetic one. Zend Framework 1.12. 

Database configure
==

<pre>CREATE table users (
	ID int NOT NULL AUTO_INCREMENT,
	email varchar(50) NOT NULL,
	password varchar(50) NOT NULL,
	role TINYINT,
	PRIMARY KEY (ID)
);</pre>

<pre>CREATE TABLE feedbacks (
	ID INT NOT NULL AUTO_INCREMENT,
	theme varchar(120),
	message text NOT NULL,
	user_email varchar(50) NOT NULL,
	PRIMARY KEY(ID)
);</pre>


Views examples
==

<img src="http://tnal.url.ph/imim/DeepinScreenshot20140915122554.png"/>
<h3>Pic.1 Account page(for owners)</h3>
<img src="http://tnal.url.ph/imim/DeepinScreenshot20140915122537.png"/>
<h3>Pic.2 Dashboard page(for admins)</h3>
<img src="http://tnal.url.ph/imim/DeepinScreenshot20140915122733.png"/>
<h3>Pic.3 Feedback send form(for all users)</h3>
<img src="http://tnal.url.ph/imim/DeepinScreenshot20140915122752.png"/>
<h3>Pic.4 Feedbacks views page(for moderators only)</h3>
