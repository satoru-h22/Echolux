/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.26 : Database - sleepdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sleepdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `sleepdb`;

/*Table structure for table `answer` */

DROP TABLE IF EXISTS `answer`;

CREATE TABLE `answer` (
  `Qu_ID` int(4) unsigned zerofill NOT NULL,
  `Client_ID` int(6) unsigned zerofill NOT NULL,
  `Date` date NOT NULL,
  `Answer` varchar(2000) NOT NULL,
  PRIMARY KEY (`Qu_ID`,`Client_ID`,`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `answer` */

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `Client_ID` int(6) unsigned zerofill NOT NULL,
  `Com_ID` int(4) unsigned zerofill NOT NULL,
  `First_Name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Administrator` tinyint(1) NOT NULL,
  `Last_Name` varchar(70) NOT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client` */

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `Com_ID` int(4) unsigned zerofill NOT NULL,
  `Com_Name` varchar(30) NOT NULL,
  `Com_Email` varchar(200) NOT NULL,
  `Com_Phone` varchar(11) NOT NULL,
  `Com_Memo` varchar(280) NOT NULL,
  PRIMARY KEY (`Com_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `company` */

/*Table structure for table `password` */

DROP TABLE IF EXISTS `password`;

CREATE TABLE `password` (
  `Client_ID` varchar(200) NOT NULL,
  `Password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `password` */

/*Table structure for table `question` */

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `Qu_ID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Sur_ID` int(4) unsigned zerofill NOT NULL,
  `Question` varchar(2000) NOT NULL,
  PRIMARY KEY (`Qu_ID`,`Sur_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `question` */

insert  into `question`(`Qu_ID`,`Sur_ID`,`Question`) values 
(0001,0001,'What time did you go to bed? '),
(0002,0001,'What time did you turn off the lights? '),
(0003,0001,'How long did it take you to fall asleep?(in hours).'),
(0004,0001,'How many times did you wake up last night?'),
(0005,0001,'What was your final wake up time this morning?'),
(0006,0001,'What time did you get out of bed?'),
(0007,0001,'Sleep Medications(indicate dose and type)'),
(0008,0001,'Rate your sleep 1-5'),
(0009,0001,'Notes- possible circumstances that might have contributed to how you slept. '),
(0010,0002,'Difficulty falling asleep'),
(0011,0002,'Difficulty staying asleep'),
(0012,0002,'Problems waking up too early'),
(0013,0002,'How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern?'),
(0014,0002,'How NOTICEABLE to others do you think your sleep problem is in terms of impairing the quality of your life? '),
(0015,0002,'How WORRIED/DISTRESSED are you about your current sleep problem?'),
(0016,0002,'To what extent do you consider your sleep problem to INTERFERE with your daily functioning (e.g. daytime fatigue, mood, ability to function at work/daily chores, concentration, memory, mood, etc.) CURRENTLY?'),
(0017,0003,'During the past seven days, how many hours did you miss from work because of your sleep problems? Include hours you missed on sick days, times you went in late, left early, etc., because of your sleep problems.'),
(0018,0003,'During the past seven days, how many hours did you miss from work because of other health problems? Include hours you missed on sick days, times you went in late, left early, etc., because of your health problems.'),
(0019,0003,'During the past seven days, how many hours did you miss from work because of any other reason, such as vacation, holidays, sick kids? '),
(0020,0003,'During the past seven days, how many hours did you actually work? '),
(0021,0003,'During the past seven days, how much did your sleep problems affect your productivity while you were working? '),
(0022,0003,'During the past seven days, how much did your sleep problems affect your ability to do your regular daily activities, other than work at a job?'),
(0023,0004,'How many nights per week do you usually have difficulty falling asleep?'),
(0024,0004,'On the nights you have trouble going to sleep, how long on average does it usually take you to fall asleep after going to bed?'),
(0025,0004,'How many nights per week do you wake up in the middle of the night and have difficulty falling back to sleep?'),
(0026,0004,'On average, how many times do you wake up per night?'),
(0027,0004,'On nights you have difficulty sleeping, how long on average are you awake during the night? (total of all the times you\'re awake)'),
(0028,0004,'How many days a week do you wake up early in the morning, before your scheduled wake time, and are unable to return to sleep?'),
(0029,0004,'On nights when you have insomnia, approximately how long do you sleep each night?'),
(0030,0004,'On nights when you don\'t have insomnia, how long do you sleep?'),
(0031,0004,'What time do you usually get into bed at night?'),
(0032,0004,'How soon do you turn off the lights to go to sleep?'),
(0033,0004,'What time do you usually get out of bed in the morning?'),
(0034,0004,'How long would you like to be able to sleep each night?'),
(0035,0004,'Do you use your bed for activities other than sleep or sexual activity?'),
(0036,0004,'At this time, how much stress would you say there is in your life?'),
(0037,0004,'How often do you take naps?'),
(0038,0004,'Do you practice any type of relaxation technique?'),
(0039,0004,'If yes, what type? (check all that apply)'),
(0040,0004,'Does difficulty sleeping ever affect your mood or functioning during the day?'),
(0041,0004,'If yes, how is your mood or functioning affected. (check all that apply)'),
(0042,0004,'Are you sleepy during the day? (sleepy means nodding off, or could close eyes and go to sleep)'),
(0043,0004,'Do you wake with aches and pains?'),
(0044,0004,'On weekends or your days off, do you sleep more than an hour later than your usual wake up time?'),
(0045,0004,'What do you do to relax prior to bedtime? (check all that apply)'),
(0046,0004,'How long have you had sleep problems?'),
(0047,0004,'Is your sleep problem sometimes worse than other times?'),
(0048,0004,'Was the onset of your sleep problem related to any specific event?'),
(0049,0004,'How often is your sleep disturbed by environmental factors such as traffic, neighbors, or family members?'),
(0050,0004,'Do you engage in some kind of regular physical exercise?'),
(0051,0004,'If yes, describe the kind, frequency, and time of day. (put N/A if it doesn\'t apply to you)'),
(0052,0004,'How many cups or glasses of caffeinated beverages (e.g. coffee, tea, or cola) do you drink in a day?'),
(0053,0004,'How often do you drink caffeinated beverages after 4 p.m.?'),
(0054,0004,'Do you use alcohol to aid sleep?'),
(0055,0004,'About how often and how much alcohol do you drink, not necessarily for sleep? (Alcohol affects your ability to sleep, this is to help assess whether your sleeplessness could be affected by alcohol consumption)'),
(0056,0004,'Do you use recreational drugs?'),
(0057,0004,'Do you smoke?'),
(0058,0004,'Have you recently taken any prescription or over-the-counter medication for sleeping problems?'),
(0059,0004,'If yes, what medication and amount are you taking? (put N/A if it doesn\'t apply to you)'),
(0060,0004,'How many nights a week do you usually take this medication?'),
(0061,0004,'How long have you been taking sleeping medication?'),
(0062,0004,'Do you snore?'),
(0063,0004,'Do you ever wake up in the night and feel unable to breathe?'),
(0064,0004,'Do your legs ever jerk repeatedly or feel restless after you go to bed at night?'),
(0065,0004,'Is there a history of sleeping difficulties in your family?'),
(0066,0004,'Have you previously been evaluated or treated for sleeping problems?'),
(0067,0004,'If yes, describe. (put N/A if it doesn\'t apply to you)'),
(0068,0004,'Have you tried any self-help remedies for you sleeping problems?'),
(0069,0004,'If yes, describe. (put N/A if it doesn\'t apply to you)'),
(0070,0004,'Do you engage in any of these activities?'),
(0071,0004,'What are some of the most important learnings or strategies that you are using to keep your sleep on track?');

/*Table structure for table `survey` */

DROP TABLE IF EXISTS `survey`;

CREATE TABLE `survey` (
  `Sur_ID` int(4) unsigned zerofill NOT NULL,
  `Sur_Name` varchar(150) NOT NULL,
  PRIMARY KEY (`Sur_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `survey` */

insert  into `survey`(`Sur_ID`,`Sur_Name`) values 
(0001,'Daily Survey'),
(0002,'Insomnia Severity Survey'),
(0003,'WPAI'),
(0004,'Pre/Post-Assesment');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
